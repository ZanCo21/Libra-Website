<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Denda;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use App\Jobs\SendDendaEmail;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Jobs\SendBlokirEmail;
use App\Models\KoleksiPribadi;
use App\Models\DetailPeminjaman;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    public function storePeminjaman(Request $request)
    {
        try {
            
            $request->validate([
                'buku_id' => 'required|exists:buku,id',
                'tanggal_peminjaman' => 'required|date',
                'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman|before_or_equal:'.date('Y-m-d', strtotime('+10 days')),
            ], [
                'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman.',
                'tanggal_pengembalian.before_or_equal' => 'Periode peminjaman maksimal adalah 10 hari.',
            ]);                                        
            
            $userId = auth()->user()->id;

            $checkStock = Buku::where('id', $request->buku_id)->where('stock', '>', 0)->exists();

            if (!$checkStock) {
                return redirect()->back()->with(['info' => "Maaf, buku ini tidak memiliki stok"]);
            }

            $peminjamanAktif = DetailPeminjaman::whereHas('peminjaman', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->whereIn('status_peminjaman', ['overdue']);
            })->exists();
            
            if ($peminjamanAktif) {
                return redirect()->back()->with(['info' => "Anda masih memiliki buku yang belum dikembalikan"]);
            }
    
            $checkUser = User::where('id', $userId)->whereIn('status',['blocked'])->exists();
            
            if ($checkUser) {
                return redirect()->back()->with(['info' => "Akun Anda telah diblokir. Silakan hubungi layanan pengguna untuk bantuan lebih lanjut."]);
            }

            $order_id = rand(100000, 999999);
            $peminjaman = new Peminjaman([
                'user_id' => $userId,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'tanggal_batas_pengembalian' => Carbon::parse($request->tanggal_pengembalian)->addWeekdays(3),
                'order_id' => $order_id,
            ]); 
            $peminjaman->save();
            $dataQR = [
                'peminjaman_id' => $peminjaman->id,
            ];
            $peminjaman->qr_code = QrCode::size(200)->generate(json_encode($dataQR));
            $peminjaman->save();

            if (is_array($request->buku_id)) {
                foreach ($request->buku_id as $bukuID) {
                    $detailPeminjaman = new DetailPeminjaman([
                        'peminjaman_id' => $peminjaman->id,
                        'buku_id' => $bukuID,
                        'status_peminjaman' => 'reserved',
                    ]);
                    $detailPeminjaman->save();
                }
            } else {
                $detailPeminjaman = new DetailPeminjaman([
                    'peminjaman_id' => $peminjaman->id,
                    'buku_id' => $request->buku_id,
                    'status_peminjaman' => 'reserved',
                ]);
                $detailPeminjaman->save();
            }

            if (is_array($request->buku_id)) {
                foreach ($request->buku_id as $bukuID) {
                    $buku = Buku::find($bukuID);
                    $buku->stock -= 1;
                    $buku->save();
                }
            } else {
                $buku = Buku::find($request->buku_id);
                $buku->stock -= 1;
                $buku->save();
            }
            
            return redirect()->route('home')->with(['success' => "Buku berhasil dibooking"],200);
        }catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
    
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function detailPeminjaman($id)
    {
        $wishlist = [];
        $countwishlist = 0;

        $reservedBooks = Peminjaman::with('DetailPeminjaman')
        ->whereHas('DetailPeminjaman', function ($query) use ($id) {
            $query->where('peminjaman_id', $id);
        })->findOrFail($id);
        
        // hitung denda
        if ($reservedBooks->denda->isNotEmpty()) {
            $totalhari = $reservedBooks->denda->count();
        } else {
            $totalhari = 1;
        }

        $totalbuku = $reservedBooks->DetailPeminjaman()->whereIn('status_peminjaman', ['overdue','lost'])->count();
        $dendaPerBuku = 5000;
        $hargaHilang = $reservedBooks->denda->sum('harga_hilang');
        $hitungDendaBukuPerhari = $totalbuku * $dendaPerBuku;
        $totalDendaBukuPerhari = $hitungDendaBukuPerhari;

        $totalJumlahDenda = $reservedBooks->denda->sum('jumlah_denda');
        $totalHargaHilang = $reservedBooks->denda->sum('harga_hilang');

        $lostItems = $reservedBooks->DetailPeminjaman()->whereIn('status_peminjaman', ['overdue', 'lost'])->exists();
        if ($lostItems) {
            $totalKeseluruhan = $totalJumlahDenda + $totalHargaHilang;
        } else {
            $totalKeseluruhan = 1000; // Atur nilai minimal yang diperbolehkan oleh Midtrans
        }    
        
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();
        }

        return view('home.detailPeminjaman', compact('wishlist', 'countwishlist','reservedBooks', 'totalhari', 'totalbuku', 'totalDendaBukuPerhari','totalKeseluruhan','hargaHilang'));
    }

    public function showcart()
    {
        $userId = auth()->user()->id;
        $wishlist = [];
        $countwishlist = 0;
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();
        }
        return view('home.cart', compact('wishlist','countwishlist'));
    }

    public function canclePeminjaman($id)
    {
        try {
            $cancel = Peminjaman::with('DetailPeminjaman')
            ->whereHas('DetailPeminjaman', function ($query) use ($id) {
                $query->where('peminjaman_id', $id);
            })->findOrFail($id);
    
            foreach ($cancel->detailPeminjaman as $detail) {
                $buku = Buku::find($detail->buku_id);
                $buku->stock += 1;
                $buku->save();
            }

            $cancel->detailPeminjaman()->update([
               'status_peminjaman' => 'cancelled',
            ]);
            
            return response()->json(['message' => 'Buku berhasil dicancel'], 201); 
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Buku gagal dicancel'], 400);
        }
    }

    public function storePeminjamanManual(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman|before_or_equal:'.date('Y-m-d', strtotime('+10 days')),
        ], [
            'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman.',
            'tanggal_pengembalian.before_or_equal' => 'Periode peminjaman maksimal adalah 10 hari.',
        ]);  

        $buku = Buku::find($request->buku_id);
        if ($buku->stock <= 0) {
            $latestPeminjaman = DetailPeminjaman::where('buku_id', $buku->id)
                ->orderBy('created_at', 'desc')
                ->first();
    
            if ($latestPeminjaman) {
                $latestPeminjaman->status_peminjaman = 'rejected';
                $latestPeminjaman->save();
    
                $buku->stock += 1;
                $buku->save();
            }
        }

        $checkStock = Buku::where('id', $request->buku_id)->where('stock', '>', 0)->exists();

        if (!$checkStock) {
            return redirect()->back()->with(['info' => "Maaf, buku ini tidak memiliki stok"]);
        }

        
        $checkUser = User::where('id', $request->userId)->whereIn('status',['blocked'])->exists();
            
        if ($checkUser) {
            return redirect()->back()->with(['info' => "Akun Anda telah diblokir. Silakan hubungi layanan pengguna untuk bantuan lebih lanjut."]);
        }

        $order_id = rand(100000, 999999);
        $peminjaman = new Peminjaman([
            'user_id' => $request->userId,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'tanggal_batas_pengembalian' => Carbon::parse($request->tanggal_pengembalian)->addWeekdays(3),
            'order_id' => $order_id,
        ]); 
        $peminjaman->save();
        $dataQR = [
            'peminjaman_id' => $peminjaman->id,
        ];
        $peminjaman->qr_code = QrCode::size(200)->generate(json_encode($dataQR));
        $peminjaman->save();

        if (is_array($request->buku_id)) {
            foreach ($request->buku_id as $bukuID) {
                $detailPeminjaman = new DetailPeminjaman([
                    'peminjaman_id' => $peminjaman->id,
                    'buku_id' => $bukuID,
                    'status_peminjaman' => 'borrowed',
                ]);
                $detailPeminjaman->save();
            }
        } else {
            $detailPeminjaman = new DetailPeminjaman([
                'peminjaman_id' => $peminjaman->id,
                'buku_id' => $request->buku_id,
                'status_peminjaman' => 'borrowed',
            ]);
            $detailPeminjaman->save();
        }

        if (is_array($request->buku_id)) {
            foreach ($request->buku_id as $bukuID) {
                $buku = Buku::find($bukuID);
                $buku->stock -= 1;
                $buku->save();
            }
        } else {
            $buku = Buku::find($request->buku_id);
            $buku->stock -= 1;
            $buku->save();
        }

        return redirect()->back()->with(['success' => "Buku berhasil dibooking"],200);
    }

    // note* tambah stok buku yang di miliki
    public function RejectBatasPeminjaman()
    {
        $batasPeminjamans = Peminjaman::whereHas('DetailPeminjaman', function ($query) {
            $query->whereIn('status_peminjaman', ['reserved'])
                  ->whereDate('tanggal_peminjaman', '<=', Carbon::now()->subDays(2));
        })->get();

        foreach ($batasPeminjamans as $batasPeminjaman) {
            foreach ($batasPeminjaman->DetailPeminjaman as $detail) {
                $detail->status_peminjaman = 'rejected';
                $detail->save();

                $buku = $detail->buku;
                $buku->stock += 1;
                $buku->save();
            }
        }
    }

    public function HitungDenda()
    {
        $peminjamanTerlambat = Peminjaman::whereHas('DetailPeminjaman', function ($query) {
            $query->whereIn('status_peminjaman', ['borrowed','overdue'])->whereDate('tanggal_pengembalian', '<', now());
        })->get();
        $imagePath = public_path('assets/home/cdn/shop/t/9/assets/logo.png');

        $emailsSent = []; 
        $emailBlokir = []; 

        foreach ($peminjamanTerlambat as $peminjaman) {
            $keterlambatan = now()->diffInDays($peminjaman->tanggal_pengembalian);
            $jumlahBuku = $peminjaman->DetailPeminjaman->count(); 
            $dendaPerBuku = 5000;

            $denda = $jumlahBuku * $dendaPerBuku * $keterlambatan;

            
            // Mengecek pengguna menerima email
            if (!in_array($peminjaman->user_id, $emailsSent)) {
                Denda::create([
                    'peminjaman_id' => $peminjaman->id,
                    'jumlah_denda' => $denda,
                    'tanggal_denda' => now(),
                ]);
                
                
                foreach ($peminjaman->DetailPeminjaman as $detail) {
                    if ($detail->status_peminjaman === 'borrowed') {
                        SendDendaEmail::dispatch($peminjaman, $denda, $imagePath)->onQueue('emails');
                    }
                    break;
                }
                
                $emailsSent[] = $peminjaman->user_id;
            }
            
            foreach ($peminjaman->DetailPeminjaman as $detail) {
                $detail->status_peminjaman = 'overdue';
                $detail->save();
            }

            if ($peminjaman->tanggal_batas_pengembalian < now()) {
                foreach ($peminjaman->DetailPeminjaman as $detail) {
                    $detail->status_peminjaman = 'lost';
                    $detail->save();
                }

                $peminjaman->user->status = 'blocked';
                $peminjaman->user->save();

                if (!in_array($peminjaman->user_id, $emailBlokir)) {
                    SendBlokirEmail::dispatch($peminjaman, $imagePath)->onQueue('emails');

                    $emailBlokir[] = $peminjaman->user_id;
                }
            }
        }
    }
}

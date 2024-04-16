<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
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
                'tanggal_pengembalian' => 'required|date',
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

            $peminjaman = new Peminjaman([
                'user_id' => $userId,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'tanggal_batas_pengembalian' => Carbon::parse($request->tanggal_pengembalian)->addWeekdays(3),
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
        
        
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();
        }

        return view('home.detailPeminjaman', compact('wishlist', 'countwishlist','reservedBooks'));
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
}

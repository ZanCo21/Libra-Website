<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\UlasanBuku;
use App\Imports\BooksImport;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\KategoriRelasi;
use App\Models\DetailPeminjaman;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Midtrans\Config;

class ManageBooksController extends Controller
{
    public function index()
    {
        $books = Buku::with('kategorirelasi')->get();
        $kategoris = KategoriBuku::get();

        return view('admin.manageBooks', compact('books', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahunTerbit' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'front_book_cover' => 'required',
            'kategori' => 'required',
        ]);

        try {
            $input = $request->all();


            if ($request->hasFile('front_book_cover')) {
                $photo = $request->file('front_book_cover');
                $booktitle = $input['judul'];
                $destinationPath = "public/photos/$booktitle";
                $photoName = 'photo_' . uniqid() . '_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($destinationPath, $photoName);

                $urlPhoto = 'photos/' . $booktitle . '/' . $photoName;
                $input['front_book_cover'] = $urlPhoto;
            }

            if ($request->hasFile('back_book_cover')) {
                $photo = $request->file('back_book_cover');
                $booktitle = $input['judul'];
                $destinationPath = "public/photos/$booktitle";
                $photoName = 'photo_' . uniqid() . '_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($destinationPath, $photoName);

                $urlPhoto = 'photos/' . $booktitle . '/' . $photoName;
                $input['back_book_cover'] = $urlPhoto;
            }

            $buku = Buku::create([
                'judul' => $request['judul'],
                'penulis' => $input['penulis'],
                'penerbit' => $input['penerbit'],
                'tahunTerbit' => $input['tahunTerbit'],
                'stock' => $input['stock'],
                'deskripsi' => $input['deskripsi'],
                'front_book_cover' => $input['front_book_cover'],
                'back_book_cover' => $input['back_book_cover'],
            ]);

            if ($buku) {
                $kategoriIds = $request->input('kategori');
                foreach ($kategoriIds as $kategoriId) {
                    KategoriRelasi::create([
                        'buku_id' => $buku->id,
                        'kategori_id' => $kategoriId,
                    ]);
                }
            }

            return response()->json(['message' => 'Buku berhasil ditambahkan'], 201);
            // return redirect()->back()->with(['success' => "Berhasil menambahkan buku"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Buku gagal ditambahkan'], 400);
            //  return redirect()->back()->with(['error' => "Gagal dalam menambahkan buku"]);
        }
    }

    public function getEditBook($id)
    {
        $getBook = Buku::with('kategorirelasi')->findOrFail($id);
        $kategoris = KategoriBuku::get();
        return view('admin.editBook', compact('getBook', 'kategoris'));
    }

    public function getUpdateBook(Request $request, $id)
    {
        try {
            $buku = Buku::findOrFail($id);
            $oldFrontCover = $buku->front_book_cover;
            $oldBackCover = $buku->back_book_cover;
            $input = $request->all();

            if ($request->hasFile('front_book_cover')) {
                $photo = $request->file('front_book_cover');
                $booktitle = $input['judul'];
                $destinationPath = "public/photos/$booktitle";
                $photoName = 'photo_' . uniqid() . '_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($destinationPath, $photoName);

                $urlPhoto = 'photos/' . $booktitle . '/' . $photoName;
                $input['front_book_cover'] = $urlPhoto;

                if ($oldFrontCover) {
                    Storage::delete('public/' . $oldFrontCover);
                }
            } else {
                $input['front_book_cover'] = $oldFrontCover;
            }

            if ($request->hasFile('back_book_cover')) {
                $photo = $request->file('back_book_cover');
                $booktitle = $input['judul'];
                $destinationPath = "public/photos/$booktitle";
                $photoName = 'photo_' . uniqid() . '_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($destinationPath, $photoName);

                $urlPhoto = 'photos/' . $booktitle . '/' . $photoName;
                $input['back_book_cover'] = $urlPhoto;

                if ($oldBackCover) {
                    Storage::delete('public/' . $oldBackCover);
                }
            } else {
                $input['back_book_cover'] = $oldBackCover;
            }

            $buku->update([
                'judul' => $request['judul'],
                'penulis' => $input['penulis'],
                'penerbit' => $input['penerbit'],
                'tahunTerbit' => $input['tahunTerbit'],
                'stock' => $input['stock'],
                'deskripsi' => $input['deskripsi'],
                'front_book_cover' => $input['front_book_cover'],
                'back_book_cover' => $input['back_book_cover'],
            ]);

            // multiple kategori
            if ($request->has('kategori')) {
                $kategoriIds = $request->input('kategori');
                $buku->kategoris()->syncWithPivotValues($kategoriIds, ['created_at' => now(), 'updated_at' => now()]);
            }

            return redirect()->back()->with('success', 'Buku berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui buku: ' . $th->getMessage());
        }
    }

    public function showtransactionBooks()
    {
        $peminjaman = Peminjaman::with('user.anggota')->with('DetailPeminjaman') // Filter tanggal peminjaman yang setelah atau sama dengan hari ini
        ->orderBy('tanggal_peminjaman', 'asc')->get();

        $getUser = User::all();

        $getBuku = Buku::all();

        $today = Carbon::today()->setTimezone('Asia/Jakarta');

        return view('admin.transactionBook', compact('peminjaman', 'today','getUser','getBuku'));
    }

    public function showScanQr($id)
    {
        $reservedBooks = Peminjaman::with('DetailPeminjaman')->findOrFail($id);

        $peminjamId = $reservedBooks->id;

        return response()->json($peminjamId);
    }

    public function showScanPage($id)
    {
        $reservedBooks = Peminjaman::with('user.anggota')->with('DetailPeminjaman')->findOrFail($id);


        if ($reservedBooks->denda->isNotEmpty()) {
            $totalhari = $reservedBooks->denda->filter(function ($item) {
                return $item->jumlah_denda != 0;
            })->count();
        } else {
            $totalhari = 1;
        }

        $totalbuku = $reservedBooks->DetailPeminjaman()->whereIn('status_peminjaman', ['overdue', 'lost'])->count();
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

        return view('admin.detailScan', compact('reservedBooks', 'totalhari', 'totalbuku', 'totalDendaBukuPerhari', 'totalKeseluruhan', 'hargaHilang'));
    }

    public function updateStatus(Request $request)
    {

        try {
            $peminjamanIds = $request->input('peminjaman_id');
            $bukuIds = $request->input('buku_id');
            $statusPeminjamanArray = $request->input('status_peminjaman');

            foreach ($bukuIds as $key => $bukuId) {
                $statusPeminjaman = $statusPeminjamanArray[$key];

                $detailPeminjaman = DetailPeminjaman::where('peminjaman_id', $peminjamanIds[$key])
                    ->where('buku_id', $bukuId)
                    ->firstOrFail();

                if ($statusPeminjaman === 'cancelled' || $statusPeminjaman == 'returned') {
                    $buku = Buku::find($bukuId);
                    $buku->stock += 1;
                    $buku->save();
                } elseif ($statusPeminjaman === 'lost') {
                    $buku = Buku::findOrFail($bukuId);
                    $hargahilang = $buku->harga;

                    // Membuat entri denda untuk buku yang hilang
                    Denda::create([
                        'peminjaman_id' => $peminjamanIds[$key],
                        'jumlah_denda' => 0, // Atur jumlah denda jika diperlukan
                        'harga_hilang' => $hargahilang,
                        'tanggal_denda' => now(),
                    ]);

                    // Memperbarui status peminjam menjadi 'blocked'

                    // $detailPeminjaman->peminjaman->user->status = 'blocked';
                    // $detailPeminjaman->peminjaman->user->save();
                }

                $detailPeminjaman->status_peminjaman = $statusPeminjaman;
                $detailPeminjaman->save();
            }

            return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status peminjaman: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new BooksImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data buku berhasil diimpor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor data buku: ' . $e->getMessage());
        }
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPeminjaman = Peminjaman::count();
        // Mendapatkan rata-rata peringkat
        $rataRataPeringkat = UlasanBuku::avg('rating');
        // Mendapatkan total ulasan buku
        $totalUlasanBuku = UlasanBuku::count();

        // Misalnya, Anda ingin menghitung variabel-variabel berikut
        $profit = $totalUsers; // Misalnya, hasil dari perhitungan profit
        $sales = $totalPeminjaman; // Misalnya, hasil dari perhitungan sales
        $payments = $totalUlasanBuku;
        $transactions = $rataRataPeringkat;

        // Hitung persentase
        $profitPercentage = ($profit / 100) * 10;
        $salesPercentage = ($sales / 100) * 10;
        $paymentsPercentage = ($payments / 100) * 10;
        $transactionsPercentage = ($transactions / 100) * 10;

        return view('admin.dashboard', compact('transactions', 'payments', 'totalUsers', 'totalPeminjaman', 'totalUlasanBuku', 'profit', 'profitPercentage', 'sales', 'salesPercentage', 'paymentsPercentage', 'transactionsPercentage'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class ManageBooksController extends Controller
{
    public function index()
    {
        $books = Buku::with('kategorirelasi')->get();
        return view('admin.manageBooks', compact('books'));
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

            Buku::create([
                'judul' => $request['judul'],
                'penulis' => $input['penulis'],
                'penerbit' => $input['penerbit'],
                'tahunTerbit' => $input['tahunTerbit'],
                'stock' => $input['stock'],
                'deskripsi' => $input['deskripsi'],
                'front_book_cover' => $input['front_book_cover'],
                'back_book_cover' => $input['back_book_cover'],
            ]);
            
            return response()->json(['message' => 'Buku berhasil ditambahkan'], 201); 
            // return redirect()->back()->with(['success' => "Berhasil menambahkan buku"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Buku gagal ditambahkan'], 400);
            //  return redirect()->back()->with(['error' => "Gagal dalam menambahkan buku"]);
        }
    }

    public function showtransactionBooks()
    {
        $peminjaman = Peminjaman::with('user.anggota')->with('DetailPeminjaman')->get();

        return view('admin.transactionBook', compact('peminjaman'));
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

        return view('admin.detailScan', compact('reservedBooks'));
    }

    public function updateStatus(Request $request)
    {

        try {
            // Ambil data dari request
            $peminjamanIds = $request->input('peminjaman_id');
            $bukuIds = $request->input('buku_id');
            $statusPeminjamanArray = $request->input('status_peminjaman');

            // Lakukan iterasi melalui setiap buku
            foreach ($bukuIds as $key => $bukuId) {
                // Ambil status peminjaman untuk buku saat ini
                $statusPeminjaman = $statusPeminjamanArray[$key];

                // Cari detail peminjaman yang sesuai dengan id peminjaman dan id buku
                $detailPeminjaman = DetailPeminjaman::where('peminjaman_id', $peminjamanIds[$key])
                                                    ->where('buku_id', $bukuId)
                                                    ->firstOrFail();
                
                // Update status peminjaman buku
                $detailPeminjaman->status_peminjaman = $statusPeminjaman;
                $detailPeminjaman->save();
            }

            return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status peminjaman: ' . $e->getMessage());
        }
    }
}

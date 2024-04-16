<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\KategoriBuku;
use App\Models\KategoriRelasi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class ManageBooksController extends Controller
{
    public function index()
    {
        $books = Buku::with('kategorirelasi')->get();
        $kategoris = KategoriBuku::get();
        
        return view('admin.manageBooks', compact('books','kategoris'));
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
            $peminjamanIds = $request->input('peminjaman_id');
            $bukuIds = $request->input('buku_id');
            $statusPeminjamanArray = $request->input('status_peminjaman');

            foreach ($bukuIds as $key => $bukuId) {
                $statusPeminjaman = $statusPeminjamanArray[$key];

                $detailPeminjaman = DetailPeminjaman::where('peminjaman_id', $peminjamanIds[$key])
                ->where('buku_id', $bukuId)
                ->firstOrFail();

                if ($statusPeminjaman === 'cancelled') {
                    $buku = Buku::find($bukuId);
                    $buku->stock += 1;
                    $buku->save();
                }    
                
                $detailPeminjaman->status_peminjaman = $statusPeminjaman;
                $detailPeminjaman->save();
            }

            return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status peminjaman: ' . $e->getMessage());
        }
    }
}

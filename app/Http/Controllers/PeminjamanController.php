<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
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

            $peminjamanAktif = Peminjaman::where('user_id', $userId)
            ->whereIn('status_peminjaman', ['reserved', 'borrowed', 'overdue'])
            ->exists();

            if ($peminjamanAktif) {
                return redirect()->back()->with(['info' => "Anda masih memiliki buku yang belum dikembalikan"]);
            }
    
            $peminjaman = new Peminjaman();
            $peminjaman->user_id = $userId;
            $peminjaman->buku_id = $request->buku_id;
            $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
            $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
            $peminjaman->tanggal_batas_pengembalian = Carbon::parse($request->tanggal_pengembalian)->addWeekdays(3);
            $peminjaman->status_peminjaman = 'reserved';
            $qrCode = QrCode::size(200)->generate(json_encode($peminjaman));
            $peminjaman->qr_code = $qrCode;
            $peminjaman->save();
    
            return view('home')->with(['success' => "Buku berhasil dibooking"],200);
        }catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
    
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function detailPeminjaman($id)
    {
        $wishlist = [];
        $countwishlist = 0;

        $reservedBooks = Peminjaman::findOrFail($id);
        
        $kategoriIds = $reservedBooks->buku->kategorirelasi()->pluck('kategori_id')->toArray();
        $categoryBook = KategoriBuku::whereIn('id', $kategoriIds)->get();
        
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();
        }

        return view('home.detailPeminjaman', compact('wishlist', 'countwishlist','reservedBooks','categoryBook'));
    }
}

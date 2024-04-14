<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
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
    
            $peminjaman = new Peminjaman();
            $peminjaman->user_id = $userId;
            $peminjaman->buku_id = $request->buku_id;
            $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
            $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
            $peminjaman->tanggal_batas_pengembalian = Carbon::parse($request->tanggal_pengembalian)->addWeekdays(3);
            $peminjaman->status_peminjaman = 'reserved';
            $peminjaman->save();
    
            return redirect()->back()->with(['success' => "Buku berhasil dipinjam"]);
        }catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
    
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
}
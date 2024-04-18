<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;
use App\Models\DetailPeminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user dan buku dari database
        $users = User::where('id', '<>', 1)->pluck('id')->toArray();
        $bukuIds = Buku::pluck('id')->toArray();
    
        // Buat beberapa peminjaman acak
        for ($i = 0; $i < 25; $i++) {
            // Ambil data secara acak dari users dan buku
            $userId = $users[array_rand($users)];
            $bukuId = $bukuIds[array_rand($bukuIds)];
    
            // Buat tanggal pengembalian acak
            $tanggalPeminjaman = now()->subDays(rand(0, 90)); // Membuat tanggal acak dalam 3 bulan terakhir
            $tanggalPengembalian = $tanggalPeminjaman->copy()->addWeekdays(7); // Tambahkan 7 hari dari tanggal peminjaman
            $tanggalBatasPengembalian = $tanggalPengembalian->copy()->addWeekdays(3); // Tambahkan 3 hari dari tanggal pengembalian
    
            // Status peminjaman acak
            $statusPeminjaman = ['reserved', 'borrowed', 'returned'];
            $status = $statusPeminjaman[array_rand($statusPeminjaman)];
    
            // Buat peminjaman
            $peminjaman = Peminjaman::create([
                'user_id' => $userId,
                'tanggal_peminjaman' => $tanggalPeminjaman,
                'tanggal_pengembalian' => $tanggalPengembalian,
                'tanggal_batas_pengembalian' => $tanggalBatasPengembalian,
            ]);
    
            // Tambahkan detail peminjaman
            DetailPeminjaman::create([
                'peminjaman_id' => $peminjaman->id,
                'buku_id' => $bukuId,
                'status_peminjaman' => $status, // Atur status peminjaman
            ]);
        }
    }
}

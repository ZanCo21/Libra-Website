<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peminjaman_id');
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman');
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku');
            $table->enum('status_peminjaman',['reserved','borrowed','overdue','returned','done','rejected','cancelled','lost']);
            // Dipesan: Reserved
            // Dipinjam: Borrowed
            // Terlambat: Overdue
            // Dikembalikan: Returned
            // Peminjaman di tolak karena masih dalam peminjaman: rejected
            // di cancle oleh pengguna: cancelled
            // pengguna Hilang tanpa kabar: Lost
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};

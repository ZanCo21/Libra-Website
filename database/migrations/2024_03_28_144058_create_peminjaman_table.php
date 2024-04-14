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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->date('tanggal_batas_pengembalian');
            $table->string('qr_code')->nullable();
            $table->enum('status_peminjaman',['reserved','borrowed','overdue','returned','rejected','cancelled','lost']);
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
        Schema::dropIfExists('peminjaman');
    }
};

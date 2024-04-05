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
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_lengkap');
            $table->string('no_identitas');
            $table->string('jenis_kartu_identitas');
            $table->string('no_telephone');
            $table->enum('jenis_kelamin',['male','female']);
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};

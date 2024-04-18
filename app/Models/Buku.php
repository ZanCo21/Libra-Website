<?php

namespace App\Models;

use App\Models\UlasanBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'buku';

    protected $fillable = [
        'judul', 'penulis', 'front_book_cover', 'back_book_cover', 'penerbit', 'tahunTerbit', 'deskripsi', 'stock'
    ];

    public function koleksipribadi()
    {
        return $this->hasMany(KoleksiPribadi::class)->withTrash();
    }

    public function kategorirelasi()
    {
        return $this->hasMany(KategoriRelasi::class);
    }

    public function ulasanBuku()
    {
        return $this->hasMany(UlasanBuku::class);
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

        public function kategoris()
    {
        return $this->belongsToMany(KategoriBuku::class, 'kategori_buku_relasi', 'buku_id', 'kategori_id');
    }
}

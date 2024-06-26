<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $table = 'kategori_buku';
    protected $fillable = [
        'namaKategori'
    ];

    public function kategorirelasi()
    {
        return $this->hasMany(KategoriRelasi::class);
    }
}

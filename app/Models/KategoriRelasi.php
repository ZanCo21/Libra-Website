<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriRelasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_buku_relasi';

    protected $fillable = [
        'buku_id', 'kategori_id'
    ];

    public function kategoribuku()
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}

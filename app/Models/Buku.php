<?php

namespace App\Models;

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
}

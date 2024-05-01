<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $table = 'denda';

    protected $fillable = [
        'peminjaman_id','jumlah_denda','tanggal_denda','harga_hilang'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'id');
    }
}

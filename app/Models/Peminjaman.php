<?php

namespace App\Models;

use App\Models\Denda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id','tanggal_peminjaman','tanggal_pengembalian', 'tanggal_batas_pengembalian', 'qr_code'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    public function denda()
    {
        return $this->hasMany(Denda::class);
    }
    
}

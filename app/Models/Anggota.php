<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'anggota';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_identitas',
        'jenis_kartu_identitas',
        'no_telephone',
        'jenis_kelamin',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrash();
    }
}

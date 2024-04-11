<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KoleksiPribadi extends Model
{
    use HasFactory;

    protected $table = 'koleksi_pribadi';

    protected $fillable = [
        'user_id', 'buku_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrash();
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id')->withTrashed();
    }    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_buku',
        'pengarang',
        'tahun_terbit',
        'penerbit',
        'jumlah_halaman'
    ];

    protected $casts = [
        'tahun_terbit' => 'integer',
        'jumlah_halaman' => 'integer',
    ];
}
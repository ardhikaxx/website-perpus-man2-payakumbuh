<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'usia',
        'keperluan',
        'yang_dicari',
        'saran_masukan',
        'tanggal_kunjungan',
        'jam_kunjungan'
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'jam_kunjungan' => 'string'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted()
    {
        static::creating(function ($pengunjung) {
            if (empty($pengunjung->tanggal_kunjungan)) {
                $pengunjung->tanggal_kunjungan = now()->toDateString();
            }
            if (empty($pengunjung->jam_kunjungan)) {
                $pengunjung->jam_kunjungan = now()->format('H:i');
            }
        });
    }
}
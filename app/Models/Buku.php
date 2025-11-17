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

    // Method untuk mendapatkan statistik buku
    public static function getStats()
    {
        $totalBuku = self::count();
        $bulanIni = now()->month;
        $tahunIni = now()->year;
        
        $bukuBulanIni = self::whereYear('created_at', $tahunIni)
            ->whereMonth('created_at', $bulanIni)
            ->count();
            
        $bukuBulanLalu = self::whereYear('created_at', $tahunIni)
            ->whereMonth('created_at', $bulanIni - 1)
            ->count();
        
        $persentase = 0;
        $trend = 'neutral';
        
        if ($bukuBulanLalu > 0) {
            $persentase = (($bukuBulanIni - $bukuBulanLalu) / $bukuBulanLalu) * 100;
        } elseif ($bukuBulanIni > 0) {
            $persentase = 100;
        }
        
        if ($persentase > 0) {
            $trend = 'up';
        } elseif ($persentase < 0) {
            $trend = 'down';
        } else {
            $trend = 'neutral';
        }
        
        return [
            'total' => $totalBuku,
            'bulan_ini' => $bukuBulanIni,
            'bulan_lalu' => $bukuBulanLalu,
            'persentase' => abs(round($persentase, 1)),
            'trend' => $trend,
            'label' => self::getTrendLabel($persentase, $bukuBulanIni, $bukuBulanLalu)
        ];
    }
    
    private static function getTrendLabel($persentase, $bulanIni, $bulanLalu)
    {
        if ($persentase > 0) {
            if ($bulanLalu == 0) {
                return 'Penambahan baru';
            }
            return 'Dari bulan lalu';
        } elseif ($persentase < 0) {
            return 'Dari bulan lalu';
        } else {
            if ($bulanIni == 0 && $bulanLalu == 0) {
                return 'Belum ada data';
            }
            return 'Tidak berubah';
        }
    }
}
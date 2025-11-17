<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter periode dari request
        $periode = $request->get('periode', 'tahun_ini');
        
        // Hitung total pengunjung
        $totalPengunjung = Pengunjung::count();
        
        // Hitung total admin
        $totalAdmin = Admin::count();
        
        // Data untuk grafik berdasarkan periode
        $grafikData = $this->getGrafikData($periode);
        $totalGrafik = $this->getTotalGrafik($periode);
        
        // Statistik trend pengunjung
        $pengunjungStats = $this->getPengunjungStats();
        
        return view('admin.dashboard.index', compact(
            'totalPengunjung',
            'totalAdmin',
            'grafikData',
            'totalGrafik',
            'periode',
            'pengunjungStats'
        ));
    }
    
    private function getPengunjungStats()
    {
        $now = Carbon::now();
        
        // Pengunjung bulan ini
        $pengunjungBulanIni = Pengunjung::whereYear('tanggal_kunjungan', $now->year)
            ->whereMonth('tanggal_kunjungan', $now->month)
            ->count();
            
        // Pengunjung bulan lalu
        $pengunjungBulanLalu = Pengunjung::whereYear('tanggal_kunjungan', $now->subMonth()->year)
            ->whereMonth('tanggal_kunjungan', $now->subMonth()->month)
            ->count();
        
        // Hitung persentase perubahan
        $persentase = 0;
        $trend = 'neutral';
        
        if ($pengunjungBulanLalu > 0) {
            $persentase = (($pengunjungBulanIni - $pengunjungBulanLalu) / $pengunjungBulanLalu) * 100;
        } elseif ($pengunjungBulanIni > 0) {
            $persentase = 100;
        }
        
        // Tentukan trend
        if ($persentase > 0) {
            $trend = 'up';
        } elseif ($persentase < 0) {
            $trend = 'down';
        } else {
            $trend = 'neutral';
        }
        
        return [
            'bulan_ini' => $pengunjungBulanIni,
            'bulan_lalu' => $pengunjungBulanLalu,
            'persentase' => abs(round($persentase, 1)),
            'trend' => $trend,
            'label' => $this->getTrendLabel($persentase, $pengunjungBulanIni, $pengunjungBulanLalu)
        ];
    }
    
    private function getTrendLabel($persentase, $bulanIni, $bulanLalu)
    {
        if ($persentase > 0) {
            if ($bulanLalu == 0) {
                return 'Pertumbuhan baru';
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
    
    private function getGrafikData($periode)
    {
        $now = Carbon::now();
        
        switch ($periode) {
            case 'minggu_ini':
                return $this->getDataMingguIni($now);
            case 'bulan_ini':
                return $this->getDataBulanIni($now);
            case 'tahun_ini':
            default:
                return $this->getDataTahunIni($now);
        }
    }
    
    private function getDataMingguIni($now)
    {
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();
        
        $data = [];
        $labels = [];
        $totalHari = 7;
        
        for ($i = 0; $i < $totalHari; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $count = Pengunjung::whereDate('tanggal_kunjungan', $date->toDateString())->count();
            
            $data[] = $count;
            $labels[] = $date->translatedFormat('D');
        }
        
        return [
            'data' => $data,
            'labels' => $labels,
            'type' => 'minggu',
            'total_items' => $totalHari
        ];
    }
    
    private function getDataBulanIni($now)
    {
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();
        $daysInMonth = $now->daysInMonth;
        
        // Untuk bulan ini, kita kelompokkan per 5 hari agar tidak terlalu panjang
        $groupSize = ceil($daysInMonth / 6); // Maksimal 6 kelompok
        $data = [];
        $labels = [];
        
        for ($i = 0; $i < $daysInMonth; $i += $groupSize) {
            $startDay = $i + 1;
            $endDay = min($i + $groupSize, $daysInMonth);
            
            $count = Pengunjung::whereBetween('tanggal_kunjungan', [
                $startOfMonth->copy()->addDays($startDay - 1)->toDateString(),
                $startOfMonth->copy()->addDays($endDay - 1)->toDateString()
            ])->count();
            
            $data[] = $count;
            
            if ($groupSize <= 3) {
                $labels[] = $startDay . ($startDay != $endDay ? '-' . $endDay : '');
            } else {
                $labels[] = $startDay . '-' . $endDay;
            }
        }
        
        return [
            'data' => $data,
            'labels' => $labels,
            'type' => 'bulan',
            'total_items' => count($data)
        ];
    }
    
    private function getDataTahunIni($now)
    {
        $startOfYear = $now->copy()->startOfYear();
        
        $data = [];
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        for ($i = 1; $i <= 12; $i++) {
            $count = Pengunjung::whereYear('tanggal_kunjungan', $now->year)
                ->whereMonth('tanggal_kunjungan', $i)
                ->count();
            
            $data[] = $count;
        }
        
        return [
            'data' => $data,
            'labels' => $labels,
            'type' => 'tahun',
            'total_items' => 12
        ];
    }
    
    private function getTotalGrafik($periode)
    {
        $now = Carbon::now();
        
        switch ($periode) {
            case 'minggu_ini':
                $start = $now->copy()->startOfWeek();
                $end = $now->copy()->endOfWeek();
                break;
            case 'bulan_ini':
                $start = $now->copy()->startOfMonth();
                $end = $now->copy()->endOfMonth();
                break;
            case 'tahun_ini':
            default:
                $start = $now->copy()->startOfYear();
                $end = $now->copy()->endOfYear();
                break;
        }
        
        return Pengunjung::whereBetween('tanggal_kunjungan', [$start, $end])->count();
    }
    
    // Method untuk data API jika diperlukan untuk AJAX
    public function getChartData(Request $request)
    {
        $periode = $request->get('periode', 'tahun_ini');
        $grafikData = $this->getGrafikData($periode);
        $totalGrafik = $this->getTotalGrafik($periode);
        $pengunjungStats = $this->getPengunjungStats();
        
        return response()->json([
            'grafikData' => $grafikData,
            'totalGrafik' => $totalGrafik,
            'pengunjungStats' => $pengunjungStats
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->get('periode', 'hari_ini');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = Pengunjung::query();

        if ($periode === 'hari_ini') {
            $query->whereDate('tanggal_kunjungan', today());
            $startDate = today()->toDateString();
            $endDate = today()->toDateString();
        } elseif ($periode === 'minggu_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ]);
            $startDate = now()->startOfWeek()->toDateString();
            $endDate = now()->endOfWeek()->toDateString();
        } elseif ($periode === 'bulan_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfMonth(),
                now()->endOfMonth()
            ]);
            $startDate = now()->startOfMonth()->toDateString();
            $endDate = now()->endOfMonth()->toDateString();
        } elseif ($periode === 'tahun_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfYear(),
                now()->endOfYear()
            ]);
            $startDate = now()->startOfYear()->toDateString();
            $endDate = now()->endOfYear()->toDateString();
        } elseif ($periode === 'custom' && $startDate && $endDate) {
            $query->whereBetween('tanggal_kunjungan', [$startDate, $endDate]);
        }

        $pengunjungs = $query->orderBy('tanggal_kunjungan', 'desc')
            ->orderBy('jam_kunjungan', 'desc')
            ->get();

        $totalPengunjung = $pengunjungs->count();
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', today())->count();
        $pengunjungBulanIni = Pengunjung::whereMonth('tanggal_kunjungan', now()->month)
            ->whereYear('tanggal_kunjungan', now()->year)
            ->count();
        $totalSemuaPengunjung = Pengunjung::count();

        $statistikJenisKelamin = Pengunjung::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get()
            ->pluck('total', 'jenis_kelamin');

        $statistikKeperluan = Pengunjung::select('keperluan', DB::raw('count(*) as total'))
            ->groupBy('keperluan')
            ->orderBy('total', 'desc')
            ->get();

        $grafikData = $this->getGrafikData($periode, $startDate, $endDate);

        return view('admin.laporan.index', compact(
            'pengunjungs',
            'periode',
            'startDate',
            'endDate',
            'totalPengunjung',
            'pengunjungHariIni',
            'pengunjungBulanIni',
            'totalSemuaPengunjung',
            'statistikJenisKelamin',
            'statistikKeperluan',
            'grafikData'
        ));
    }

    private function getGrafikData($periode, $startDate, $endDate)
    {
        $query = Pengunjung::query();

        if ($periode === 'custom' && $startDate && $endDate) {
            $query->whereBetween('tanggal_kunjungan', [$startDate, $endDate]);
            $start = Carbon::parse($startDate);
            $end = Carbon::parse($endDate);
            $diffDays = $start->diffInDays($end);

            if ($diffDays <= 31) {
                return $this->getDataHarian($start, $end);
            } else {
                return $this->getDataBulanan($start, $end);
            }
        } elseif ($periode === 'hari_ini') {
            return $this->getDataPerJam();
        } elseif ($periode === 'minggu_ini') {
            return $this->getDataMingguan();
        } elseif ($periode === 'bulan_ini') {
            return $this->getDataHarianBulanIni();
        } else {
            return $this->getDataBulananTahunIni();
        }
    }

    private function getDataHarian($start, $end)
    {
        $data = [];
        $labels = [];

        $current = $start->copy();
        while ($current <= $end) {
            $count = Pengunjung::whereDate('tanggal_kunjungan', $current)->count();
            $data[] = $count;
            $labels[] = $current->format('d M');
            $current->addDay();
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'type' => 'harian'
        ];
    }

    private function getDataBulanan($start, $end)
    {
        $data = [];
        $labels = [];

        $current = $start->copy()->startOfMonth();
        $end = $end->copy()->endOfMonth();

        while ($current <= $end) {
            $count = Pengunjung::whereYear('tanggal_kunjungan', $current->year)
                ->whereMonth('tanggal_kunjungan', $current->month)
                ->count();
            $data[] = $count;
            $labels[] = $current->format('M Y');
            $current->addMonth();
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'type' => 'bulanan'
        ];
    }

    private function getDataPerJam()
    {
        $data = [];
        $labels = [];

        for ($i = 7; $i <= 17; $i++) {
            $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
            $count = Pengunjung::whereDate('tanggal_kunjungan', today())
                ->whereTime('jam_kunjungan', '>=', $hour . ':00:00')
                ->whereTime('jam_kunjungan', '<', ($hour + 1) . ':00:00')
                ->count();
            $data[] = $count;
            $labels[] = $hour . ':00';
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'type' => 'perjam'
        ];
    }

    private function getDataMingguan()
    {
        $data = [];
        $labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];

        $startOfWeek = now()->startOfWeek();

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $count = Pengunjung::whereDate('tanggal_kunjungan', $date)->count();
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'type' => 'mingguan'
        ];
    }

    private function getDataHarianBulanIni()
    {
        $data = [];
        $labels = [];

        $start = now()->startOfMonth();
        $end = now()->endOfMonth();
        $current = $start->copy();

        while ($current <= $end) {
            $count = Pengunjung::whereDate('tanggal_kunjungan', $current)->count();
            $data[] = $count;
            $labels[] = $current->format('d');
            $current->addDay();
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'type' => 'harian'
        ];
    }

    private function getDataBulananTahunIni()
    {
        $data = [];
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        for ($i = 1; $i <= 12; $i++) {
            $count = Pengunjung::whereYear('tanggal_kunjungan', now()->year)
                ->whereMonth('tanggal_kunjungan', $i)
                ->count();
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'type' => 'bulanan'
        ];
    }

    public function export(Request $request)
    {
        $periode = $request->get('periode', 'hari_ini');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = Pengunjung::query();

        if ($periode === 'hari_ini') {
            $query->whereDate('tanggal_kunjungan', today());
            $startDate = today()->toDateString();
            $endDate = today()->toDateString();
        } elseif ($periode === 'minggu_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ]);
            $startDate = now()->startOfWeek()->toDateString();
            $endDate = now()->endOfWeek()->toDateString();
        } elseif ($periode === 'bulan_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfMonth(),
                now()->endOfMonth()
            ]);
            $startDate = now()->startOfMonth()->toDateString();
            $endDate = now()->endOfMonth()->toDateString();
        } elseif ($periode === 'tahun_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfYear(),
                now()->endOfYear()
            ]);
            $startDate = now()->startOfYear()->toDateString();
            $endDate = now()->endOfYear()->toDateString();
        } elseif ($periode === 'custom' && $startDate && $endDate) {
            $query->whereBetween('tanggal_kunjungan', [$startDate, $endDate]);
        }

        $pengunjungs = $query->orderBy('tanggal_kunjungan', 'desc')
            ->orderBy('jam_kunjungan', 'desc')
            ->get();

        $totalPengunjung = $pengunjungs->count();
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', today())->count();
        $pengunjungBulanIni = Pengunjung::whereMonth('tanggal_kunjungan', now()->month)
            ->whereYear('tanggal_kunjungan', now()->year)
            ->count();
        $totalSemuaPengunjung = Pengunjung::count();

        $statistikJenisKelamin = Pengunjung::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get()
            ->pluck('total', 'jenis_kelamin');

        $statistikKeperluan = Pengunjung::select('keperluan', DB::raw('count(*) as total'))
            ->groupBy('keperluan')
            ->orderBy('total', 'desc')
            ->get();

        return view('admin.laporan.export-pdf', compact(
            'pengunjungs',
            'periode',
            'startDate',
            'endDate',
            'totalPengunjung',
            'pengunjungHariIni',
            'pengunjungBulanIni',
            'totalSemuaPengunjung',
            'statistikJenisKelamin',
            'statistikKeperluan'
        ));
    }

    public function exportPDF(Request $request)
    {
        $periode = $request->get('periode', 'hari_ini');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = Pengunjung::query();

        if ($periode === 'hari_ini') {
            $query->whereDate('tanggal_kunjungan', today());
            $startDate = today()->toDateString();
            $endDate = today()->toDateString();
        } elseif ($periode === 'minggu_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ]);
            $startDate = now()->startOfWeek()->toDateString();
            $endDate = now()->endOfWeek()->toDateString();
        } elseif ($periode === 'bulan_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfMonth(),
                now()->endOfMonth()
            ]);
            $startDate = now()->startOfMonth()->toDateString();
            $endDate = now()->endOfMonth()->toDateString();
        } elseif ($periode === 'tahun_ini') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfYear(),
                now()->endOfYear()
            ]);
            $startDate = now()->startOfYear()->toDateString();
            $endDate = now()->endOfYear()->toDateString();
        } elseif ($periode === 'custom' && $startDate && $endDate) {
            $query->whereBetween('tanggal_kunjungan', [$startDate, $endDate]);
        }

        $pengunjungs = $query->orderBy('tanggal_kunjungan', 'desc')
            ->orderBy('jam_kunjungan', 'desc')
            ->get();

        $totalPengunjung = $pengunjungs->count();
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', today())->count();
        $pengunjungBulanIni = Pengunjung::whereMonth('tanggal_kunjungan', now()->month)
            ->whereYear('tanggal_kunjungan', now()->year)
            ->count();
        $totalSemuaPengunjung = Pengunjung::count();

        $statistikJenisKelamin = Pengunjung::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get()
            ->pluck('total', 'jenis_kelamin');

        $statistikKeperluan = Pengunjung::select('keperluan', DB::raw('count(*) as total'))
            ->groupBy('keperluan')
            ->orderBy('total', 'desc')
            ->get();

        $data = [
            'pengunjungs' => $pengunjungs,
            'periode' => $periode,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalPengunjung' => $totalPengunjung,
            'pengunjungHariIni' => $pengunjungHariIni,
            'pengunjungBulanIni' => $pengunjungBulanIni,
            'totalSemuaPengunjung' => $totalSemuaPengunjung,
            'statistikJenisKelamin' => $statistikJenisKelamin,
            'statistikKeperluan' => $statistikKeperluan,
            'tanggalExport' => now()->format('d F Y H:i:s'),
            'autoPrint' => true
        ];

        return view('admin.laporan.export-pdf', $data);
    }
}
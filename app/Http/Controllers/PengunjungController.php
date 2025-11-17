<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', today())->get();
        $totalPengunjungHariIni = $pengunjungHariIni->count();
        
        return view('index', compact('pengunjungHariIni', 'totalPengunjungHariIni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Data received:', $request->all());

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'usia' => 'required|integer|min:1|max:100',
            'keperluan' => 'required|string|max:255',
            'yang_dicari' => 'nullable|string|max:255',
            'saran_masukan' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $pengunjung = Pengunjung::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'usia' => (int) $validated['usia'],
                'keperluan' => $validated['keperluan'],
                'yang_dicari' => $validated['yang_dicari'] ?? null,
                'saran_masukan' => $validated['saran_masukan'] ?? null,
                'tanggal_kunjungan' => now()->toDateString(),
                'jam_kunjungan' => now()->format('H:i')
            ]);

            DB::commit();

            Log::info('Data saved successfully:', $pengunjung->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Data pengunjung berhasil disimpan!',
                'data' => $pengunjung
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Error saving data: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
                'debug' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Get pengunjung hari ini untuk API
     */
    public function getPengunjungHariIni()
    {
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', today())
            ->orderBy('created_at', 'desc')
            ->get();

        $totalPengunjungHariIni = $pengunjungHariIni->count();

        return response()->json([
            'total_pengunjung' => $totalPengunjungHariIni,
            'pengunjung' => $pengunjungHariIni
        ]);
    }

    /**
     * Get statistik pengunjung
     */
    public function getStatistik()
    {
        $totalPengunjung = Pengunjung::count();
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', today())->count();
        $pengunjungBulanIni = Pengunjung::whereYear('tanggal_kunjungan', now()->year)
            ->whereMonth('tanggal_kunjungan', now()->month)
            ->count();

        return response()->json([
            'total_pengunjung' => $totalPengunjung,
            'pengunjung_hari_ini' => $pengunjungHariIni,
            'pengunjung_bulan_ini' => $pengunjungBulanIni
        ]);
    }
}
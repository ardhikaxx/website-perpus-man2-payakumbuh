<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class ManajemenBukuController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');

        $query = Buku::orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_buku', 'like', "%{$search}%")
                    ->orWhere('pengarang', 'like', "%{$search}%")
                    ->orWhere('penerbit', 'like', "%{$search}%");
            });
        }

        $bukus = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'html' => view('admin.manajemen-buku.partials.buku_table', compact('bukus', 'search'))->render(),
                'pagination' => (string) $bukus->links('vendor.pagination.custom'),
                'stats' => Buku::getStats()
            ]);
        }

        return view('admin.manajemen-buku.index', compact('bukus', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'penerbit' => 'required|string|max:255',
            'jumlah_halaman' => 'required|integer|min:1'
        ]);

        try {
            $buku = Buku::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil ditambahkan!',
                'buku' => $buku
            ], 200, ['Content-Type' => 'application/json; charset=utf-8']);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }

    public function show($id)
    {
        try {
            $buku = Buku::find($id);

            if (!$buku) {
                return response()->json([
                    'success' => false,
                    'message' => 'Buku tidak ditemukan'
                ], 404, ['Content-Type' => 'application/json; charset=utf-8']);
            }

            return response()->json([
                'success' => true,
                'buku' => [
                    'id' => $buku->id,
                    'judul_buku' => $buku->judul_buku,
                    'pengarang' => $buku->pengarang,
                    'tahun_terbit' => $buku->tahun_terbit,
                    'penerbit' => $buku->penerbit,
                    'jumlah_halaman' => $buku->jumlah_halaman,
                    'created_at' => $buku->created_at->format('d M Y')
                ]
            ], 200, ['Content-Type' => 'application/json; charset=utf-8']);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404, ['Content-Type' => 'application/json; charset=utf-8']);
        }

        // Validasi yang sama dengan store
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'penerbit' => 'required|string|max:255',
            'jumlah_halaman' => 'required|integer|min:1'
        ]);

        try {
            // Update data
            $buku->update([
                'judul_buku' => $request->judul_buku,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'penerbit' => $request->penerbit,
                'jumlah_halaman' => $request->jumlah_halaman
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil diperbarui!',
                'buku' => $buku
            ], 200, ['Content-Type' => 'application/json; charset=utf-8']);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }

    public function destroy($id)
    {
        try {
            $buku = Buku::find($id);

            if (!$buku) {
                return response()->json([
                    'success' => false,
                    'message' => 'Buku tidak ditemukan'
                ], 404, ['Content-Type' => 'application/json; charset=utf-8']);
            }

            $buku->delete();

            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil dihapus!'
            ], 200, ['Content-Type' => 'application/json; charset=utf-8']);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }
}
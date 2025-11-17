<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ManajemenAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.manajemen-admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $admin = new Admin();
            $admin->nama_lengkap = $request->nama_lengkap;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                
                $fotoPath = public_path('assets/admin');
                
                if (!File::exists($fotoPath)) {
                    File::makeDirectory($fotoPath, 0755, true);
                }
                
                $foto->move($fotoPath, $fotoName);
                
                $admin->foto = 'assets/admin/' . $fotoName;
            }

            $admin->save();

            return response()->json([
                'success' => true,
                'message' => 'Admin berhasil ditambahkan!',
                'admin' => $admin
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $admin = Admin::find($id);
            
            if (!$admin) {
                return response()->json([
                    'success' => false,
                    'message' => 'Admin tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'admin' => [
                    'id' => $admin->id,
                    'nama_lengkap' => $admin->nama_lengkap,
                    'email' => $admin->email,
                    'foto' => $admin->foto,
                    'created_at' => $admin->created_at
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        
        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $admin->nama_lengkap = $request->nama_lengkap;
            $admin->email = $request->email;

            if ($request->filled('password')) {
                $admin->password = Hash::make($request->password);
            }

            if ($request->hasFile('foto')) {
                if ($admin->foto && File::exists(public_path($admin->foto))) {
                    File::delete(public_path($admin->foto));
                }
                
                $foto = $request->file('foto');
                $fotoName = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                
                $fotoPath = public_path('assets/admin');
                
                if (!File::exists($fotoPath)) {
                    File::makeDirectory($fotoPath, 0755, true);
                }
                
                $foto->move($fotoPath, $fotoName);
                
                $admin->foto = 'assets/admin/' . $fotoName;
            }

            $admin->save();

            return response()->json([
                'success' => true,
                'message' => 'Admin berhasil diperbarui!',
                'admin' => $admin
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $admin = Admin::find($id);
            
            if (!$admin) {
                return response()->json([
                    'success' => false,
                    'message' => 'Admin tidak ditemukan'
                ], 404);
            }
            
            if ($admin->id === auth()->guard('admin')->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus akun yang sedang digunakan!'
                ], 422);
            }

            if ($admin->foto && File::exists(public_path($admin->foto))) {
                File::delete(public_path($admin->foto));
            }

            $admin->delete();

            return response()->json([
                'success' => true,
                'message' => 'Admin berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
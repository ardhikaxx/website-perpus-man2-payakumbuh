<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PengaturanController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('admin.pengaturan.index', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth('admin')->user();

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_lengkap' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[a-zA-Z\s\.\,]+$/'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('admins')->ignore($admin->id),
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'foto' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
            ]
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'nama_lengkap.string' => 'Nama lengkap harus berupa teks',
            'nama_lengkap.min' => 'Nama lengkap minimal 2 karakter',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter',
            'nama_lengkap.regex' => 'Nama lengkap hanya boleh mengandung huruf, spasi, titik, dan koma',

            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah digunakan oleh admin lain',
            'email.regex' => 'Format email tidak valid',

            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp',
            'foto.max' => 'Ukuran gambar maksimal 2MB',
            'foto.dimensions' => 'Dimensi gambar harus antara 100x100 hingga 2000x2000 pixel'
        ]);

        // Validasi custom untuk mencegah XSS
        $validator->after(function ($validator) use ($request) {
            $dangerousPatterns = [
                '/<script\b[^>]*>(.*?)<\/script>/is',
                '/javascript:/i',
                '/onclick|onload|onerror|onmouseover/i',
                '/<iframe|<embed|<object/i'
            ];

            foreach ($dangerousPatterns as $pattern) {
                if (preg_match($pattern, $request->nama_lengkap)) {
                    $validator->errors()->add('nama_lengkap', 'Nama lengkap mengandung karakter yang tidak diizinkan');
                    break;
                }

                if (preg_match($pattern, $request->email)) {
                    $validator->errors()->add('email', 'Email mengandung karakter yang tidak diizinkan');
                    break;
                }
            }

            // Validasi panjang nama yang masuk akal
            if (strlen($request->nama_lengkap) < 2) {
                $validator->errors()->add('nama_lengkap', 'Nama lengkap terlalu pendek');
            }

            if (strlen($request->nama_lengkap) > 255) {
                $validator->errors()->add('nama_lengkap', 'Nama lengkap terlalu panjang');
            }
        });

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Sanitize data
            $nama_lengkap = trim(strip_tags($request->nama_lengkap));
            $email = trim(strtolower($request->email));

            $updateData = [
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
            ];

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');

                // Validasi tambahan untuk foto
                if (!$foto->isValid()) {
                    throw new \Exception('File foto tidak valid');
                }

                // Cek ekstensi file
                $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif', 'webp'];
                $extension = strtolower($foto->getClientOriginalExtension());

                if (!in_array($extension, $allowedExtensions)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Format file tidak didukung',
                        'errors' => ['foto' => ['Format file harus jpeg, png, jpg, gif, atau webp']]
                    ], 422);
                }

                // Cek MIME type
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
                $mimeType = $foto->getMimeType();

                if (!in_array($mimeType, $allowedMimeTypes)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Tipe file tidak didukung',
                        'errors' => ['foto' => ['Tipe file gambar tidak valid']]
                    ], 422);
                }

                $fotoName = time() . '_' . uniqid() . '.' . $extension;

                $fotoPath = public_path('assets/admin');

                if (!File::exists($fotoPath)) {
                    File::makeDirectory($fotoPath, 0755, true);
                }

                // Hapus foto lama jika ada
                if ($admin->foto && File::exists(public_path($admin->foto))) {
                    File::delete(public_path($admin->foto));
                }

                $foto->move($fotoPath, $fotoName);

                $updateData['foto'] = 'assets/admin/' . $fotoName;
            }

            // Gunakan update() method
            $isUpdated = Admin::where('id', $admin->id)->update($updateData);

            if (!$isUpdated) {
                throw new \Exception('Gagal memperbarui data admin');
            }

            DB::commit();

            // Ambil data admin yang terbaru
            $updatedAdmin = Admin::find($admin->id);

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui!',
                'admin' => [
                    'id' => $updatedAdmin->id,
                    'nama_lengkap' => $updatedAdmin->nama_lengkap,
                    'email' => $updatedAdmin->email,
                    'foto' => $updatedAdmin->foto
                ]
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePassword(Request $request)
    {
        $admin = auth('admin')->user();

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'current_password' => [
                'required',
                'string',
                'min:1'
            ],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/'
            ],
            'new_password_confirmation' => [
                'required',
                'string',
                'min:8'
            ]
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'current_password.string' => 'Password harus berupa teks',
            'current_password.min' => 'Password saat ini tidak valid',

            'new_password.required' => 'Password baru wajib diisi',
            'new_password.string' => 'Password baru harus berupa teks',
            'new_password.min' => 'Password baru minimal 8 karakter',
            'new_password.max' => 'Password baru maksimal 255 karakter',
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai',
            'new_password.regex' => 'Password baru harus mengandung minimal 1 huruf kecil, 1 huruf besar, 1 angka, dan 1 karakter spesial',

            'new_password_confirmation.required' => 'Konfirmasi password baru wajib diisi',
            'new_password_confirmation.string' => 'Konfirmasi password harus berupa teks',
            'new_password_confirmation.min' => 'Konfirmasi password minimal 8 karakter'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Cek password saat ini
            if (!Hash::check($request->current_password, $admin->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password saat ini tidak sesuai!',
                    'errors' => ['current_password' => ['Password saat ini tidak sesuai']]
                ], 422);
            }

            // Sanitize password
            $newPassword = trim($request->new_password);

            // Update password menggunakan query builder
            $isUpdated = Admin::where('id', $admin->id)->update([
                'password' => Hash::make($newPassword)
            ]);

            if (!$isUpdated) {
                throw new \Exception('Gagal memperbarui password');
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Password berhasil diperbarui!'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
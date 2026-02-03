# Website Perpustakaan MAN 2 Payakumbuh

Website Perpustakaan MAN 2 Payakumbuh adalah aplikasi web untuk mendata kunjungan, mengelola koleksi buku, serta memudahkan admin dalam membuat laporan aktivitas perpustakaan.

## Daftar Isi
- [Fitur Utama](#fitur-utama)
- [Teknologi](#teknologi)
- [Struktur Modul](#struktur-modul)
- [Quick Start](#quick-start)
- [Akun Admin Seed](#akun-admin-seed)
- [Script Penting](#script-penting)
- [Kontribusi](#kontribusi)

## Fitur Utama
- **Form Pengunjung**: pencatatan kunjungan tamu perpustakaan.
- **Dashboard Admin**: ringkasan statistik pengunjung, admin, dan buku.
- **Manajemen Buku**: tambah, ubah, hapus, dan lihat detail data buku.
- **Manajemen Admin**: kelola akun admin (profil, foto, dan hak akses).
- **Laporan**: rekap statistik kunjungan dan ekspor ke CSV/PDF.
- **Pengaturan Akun**: ubah profil dan kata sandi admin.

## Teknologi
- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Blade + Vite + Tailwind CSS
- **Database**: MySQL (atau database kompatibel Laravel)

## Struktur Modul
Modul utama bisa ditemukan di `app/Http/Controllers` dan `routes/web.php`:
- **AuthController**: autentikasi admin (login/logout).
- **DashboardController**: statistik ringkasan perpustakaan.
- **PengunjungController**: input dan rekap data pengunjung.
- **ManajemenBukuController**: CRUD data buku.
- **ManajemenAdminController**: CRUD akun admin.
- **LaporanController**: filter laporan dan ekspor data.
- **PengaturanController**: pengaturan profil dan kata sandi.

## Quick Start
1. **Install dependency backend**
   ```bash
   composer install
   ```
2. **Salin konfigurasi environment**
   ```bash
   cp .env.example .env
   ```
3. **Atur koneksi database** di file `.env`.
4. **Generate app key**
   ```bash
   php artisan key:generate
   ```
5. **Migrasi & seed data**
   ```bash
   php artisan migrate --seed
   ```
6. **Install dependency frontend & build assets**
   ```bash
   npm install
   npm run build
   ```
7. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```

> Alternatif cepat: jalankan `composer run setup` untuk menyiapkan aplikasi secara otomatis.

## Akun Admin Seed
Setelah menjalankan seeder, Anda bisa login menggunakan akun berikut:
- **Email**: `admin@perpus.com`
- **Password**: `password`

> Akun ini dibuat di `database/seeders/AdminSeeder.php`.

## Script Penting
- **Menjalankan mode development**
  ```bash
  composer run dev
  ```
  Menjalankan server Laravel, queue listener, dan Vite bersamaan.

- **Menjalankan test**
  ```bash
  composer run test
  ```

## Kontribusi
Kontribusi sangat terbuka. Silakan ajukan issue atau pull request untuk perbaikan dan fitur baru.

---
**Repository Source**: https://github.com/ardhikaxx/website-perpus-man2-payakumbuh

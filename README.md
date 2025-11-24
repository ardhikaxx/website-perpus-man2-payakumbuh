# Website Perpustakaan MAN 2 Payakumbuh

Website Perpustakaan MAN 2 Payakumbuh adalah aplikasi web yang memudahkan pengelolaan dan pencarian koleksi buku di perpustakaan MAN 2 Payakumbuh. Aplikasi ini dibangun dengan PHP dan Blade (Laravel), dengan tampilan interaktif dan mudah digunakan.

## Fitur Aplikasi

### Sidebar (Menu Navigasi)
Berikut adalah fitur-fitur utama yang biasanya tersedia pada sidebar aplikasi (berdasarkan struktur controller dan route):

- **Dashboard**: Tampilkan statistik dan ringkasan utama perpustakaan (jumlah pengunjung, buku, admin, grafik statistik bulanan).
- **Manajemen Buku**: CRUD data buku (tambah, edit, hapus, detil, dan pencarian buku).
- **Manajemen Admin**: CRUD data admin (tambah, edit, hapus, detil profil admin).
- **Laporan**: Laporan statistik kunjungan (berdasarkan periode: harian, mingguan, bulanan, tahunan, custom date), grafik kunjungan, dan ekspor laporan (CSV, PDF).
- **Pengaturan Akun**: Update profil dan mengubah password.
- **Logout**: Logout dari sistem.

---

### Rincian Fitur Pada Setiap Controller

#### 1. AuthController
- **Login/Logout Admin**: Form login dengan validasi, autentikasi admin, sesi pengguna, dan pesan error jika login gagal.
- **Logout**: Mengakhiri sesi admin dan mengarahkan ke halaman login.

#### 2. DashboardController
- **Statistik Pengunjung, Buku, Admin**: Menampilkan total dan tren statistik (grafik pertumbuhan), serta rekap berdasarkan periode (mingguan, bulanan, tahunan).
- **Ringkasan Buku**: Jumlah buku berdasarkan kategori/status.

#### 3. PengunjungController
- **Input Data Pengunjung**: Form isian tamu untuk mencatat nama, jenis kelamin, usia, keperluan, buku yang dicari, dan saran.
- **Rekap Pengunjung Hari Ini**: Menampilkan data pengunjung hari ini.
- **API Statistik Pengunjung**: Endpoint untuk rekap data pengunjung (harian/statistik).

#### 4. ManajemenAdminController
- **Daftar Admin**: Lihat semua admin, pencarian, dan pagination.
- **Tambah Admin**: Validasi dan simpan admin baru (termasuk upload foto profil).
- **Edit/Hapus Admin**: Update data atau hapus admin.
- **Lihat Profil Admin**: Detail informasi admin.

#### 5. ManajemenBukuController
- **Daftar Buku**: Lihat seluruh buku dengan pencarian dan filter.
- **Tambah Buku**: Input data baru (judul, pengarang, tahun, penerbit, jumlah halaman).
- **Edit/Hapus Buku**: Update data atau hapus buku.
- **Detail Buku**: Informasi rinci buku.

#### 6. LaporanController
- **Laporan Pengunjung**: Filter laporan berdasarkan periode (hari, minggu, bulan, tahun, rentang waktu).
- **Statistik Jenis Kelamin & Keperluan**: Visualisasi data pengunjung per kategori.
- **Ekspor Laporan**: Ekspor laporan dalam format CSV atau PDF.

#### 7. PengaturanController
- **Profil Admin**: Update nama, email, foto profil dengan validasi keamanan (anti-XSS).
- **Ganti Password**: Update password admin.
- **Proteksi Validasi**: Validasi regex dan keamanan input form.

---

## Teknologi yang Digunakan

- **Backend**: PHP (Laravel)
- **Frontend**: Blade Template, CSS, JavaScript
- **Database**: MySQL (umumnya Laravel)
- **Fitur Tambahan**: Validasi keamanan input, logging aktivitas, ekspor laporan, API pengunjung.

## Cara Menjalankan

1. Clone repo ini.
2. Instal dependency via Composer:
   ```
   composer install
   ```
3. Copy `.env.example` ke `.env` dan konfigurasi database.
4. Generate key Laravel:
   ```
   php artisan key:generate
   ```
5. Jalankan migrasi dan seeder database:
   ```
   php artisan migrate --seed
   ```
6. Jalankan server:
   ```
   php artisan serve
   ```

## Kontribusi & Lisensi

Anda dapat mengembangkan aplikasi ini dengan mengikuti standar Laravel. Silakan membuat pull request atau issue untuk kontribusi. Lisensi mengikuti standar open source yang tertera di repo.

---

> **Repository Source:**  
> https://github.com/ardhikaxx/website-perpus-man2-payakumbuh

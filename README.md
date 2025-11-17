<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Website Perpustakaan MAN 2 Payakumbuh

Selamat datang di **Website Perpustakaan MAN 2 Payakumbuh**!  
Ini adalah aplikasi web yang membantu pengelolaan perpustakaan secara digital untuk lingkungan sekolah MAN 2 Payakumbuh.

---

## 🚀 Fitur Utama

Fitur-fitur utama aplikasi ini didesain untuk memudahkan siswa, guru, dan petugas perpustakaan dalam mengakses layanan perpustakaan secara digital. Semua fitur utama dapat diakses melalui **sidebar** navigasi yang intuitif, di antaranya:

### 📚 Sidebar Fitur Utama

- **Dashboard**  
  Melihat ringkasan utama aktivitas perpustakaan dan statistik pinjaman buku.

- **Daftar Buku**  
  Menampilkan koleksi lengkap buku perpustakaan beserta detail informasi.

- **Peminjaman Buku**  
  Proses peminjaman buku yang mudah dan efisien secara online.

- **Pengembalian Buku**  
  Pelaporan pengembalian buku secara langsung dengan status real-time.

- **Anggota Perpustakaan**  
  Manajemen data anggota (siswa/guru) dengan fitur tambah, edit, dan hapus anggota.

- **Petugas Perpustakaan**  
  Manajemen petugas yang memiliki akses khusus untuk administrasi.

- **Laporan & Statistik**  
  Menyediakan laporan peminjaman, pengembalian, serta statistik penggunaan perpustakaan.

- **Pengaturan Profil**  
  Setiap pengguna dapat mengelola & memperbarui profil pribadinya.

---

## 🛠 Teknologi

- **PHP** – Back-end dan logika utama aplikasi.
- **Blade (Laravel Blade Template)** – Templating engine untuk tampilan dinamis dan responsif.
- **CSS** – Tampilan antar-muka yang menarik.
- **JavaScript** – Interaksi UI sederhana dan dinamis.

---

## 📦 Instalasi & Penggunaan

1. Clone repo ini:
   ```bash
   git clone https://github.com/ardhikaxx/website-perpus-man2-payakumbuh.git
   ```
2. Instal dependency (Laravel):
   ```bash
   composer install
   npm install
   npm run dev
   ```
3. Copy `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.
4. Jalankan migrasi dan seeder (opsional):
   ```bash
   php artisan migrate --seed
   ```
5. Jalankan aplikasi:
   ```bash
   php artisan serve
   ```

Akses web di `http://localhost:8000`

---

## 💡 Kontribusi

Kontribusi sangat terbuka! Silakan buat _issue_ atau _pull request_ untuk perbaikan dan penambahan fitur.

---

## ©️ Lisensi

Proyek ini dilisensikan di bawah MIT License.
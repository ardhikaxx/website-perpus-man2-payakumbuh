<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namaLengkap = [
            'Ahmad Rizki', 'Siti Nurhaliza', 'Budi Santoso', 'Maya Sari', 'Rina Anggraeni',
            'Dedi Pratama', 'Fajar Nugroho', 'Lia Amelia', 'Hendra Wijaya', 'Dewi Lestari',
            'Irfan Maulana', 'Nina Rosita', 'Joko Susilo', 'Sari Indah', 'Rizky Pratama',
            'Anita Wulandari', 'Eko Prasetyo', 'Mira Handayani', 'Agus Salim', 'Linda Permata',
            'Rudi Hartono', 'Yuni Astuti', 'Ade Supriyadi', 'Martha Olivia', 'Firman Syah',
            'Gita Purnama', 'Hari Setiawan', 'Kartika Dewi', 'Lukman Hakim', 'Nadia Putri',
            'Oscar Fernando', 'Putri Ayu', 'Rafi Abdullah', 'Salsa Bila', 'Toni Gunawan',
            'Umi Kulsum', 'Vino Marcel', 'Wulan Sari', 'Yoga Pratama', 'Zahra Amanda',
            'Alex Firmansyah', 'Bella Cantika', 'Candra Kurniawan', 'Diana Septi', 'Eka Saputra',
            'Farhan Rizki', 'Gina Melati', 'Hilman Fauzi', 'Intan Permata', 'Jefri Andika',
            'Khalid Rahman', 'Larasati', 'M. Fadli', 'Nia Kurnia', 'Oki Setiawan',
            'Puspita Sari', 'Qory Sandeva', 'Rangga Pratama', 'Sinta Novita', 'Taufik Hidayat',
            'Ucok Siregar', 'Vina Amelia', 'Wahyu Adi', 'Xena Alexandra', 'Yuda Maulana',
            'Zaki Alamsyah', 'Aisyah Rahma', 'Bagus Setiawan', 'Cindy Nursanti', 'Doni Saputra',
            'Elsa Fitriani', 'Fahmi Akbar', 'Galuh Prameswari', 'Hasan Basri', 'Ika Wulandari',
            'Jamilah Nur', 'Kiki Amalia', 'Lutfi Ramadhan', 'Meta Anggraini', 'Nando Pratista',
            'Opik Taufik', 'Pratiwi Kusuma', 'Queen Safira', 'Reno Ardian', 'Sely Mustika',
            'Teguh Wibowo', 'Ujang Hermawan', 'Vita Mariana', 'Wira Nugraha', 'Xavier Lee',
            'Yani Hartati', 'Zulfikar Ali', 'Ade Irma', 'Bima Sakti', 'Chandra Wijaya',
            'Dini Octavia', 'Eko Yulianto', 'Fitri Handayani', 'Gilang Ramadhan', 'Hesti Rahayu'
        ];

        $jenisKelamin = ['Laki-laki', 'Perempuan'];
        $keperluanOptions = [
            'Meminjam Buku', 'Membaca di Tempat', 'Mengembalikan Buku', 'Konsultasi Referensi',
            'Mencari Buku Pelajaran', 'Studi Literatur', 'Mengerjakan Tugas', 'Bimbingan Belajar',
            'Research', 'Baca Koran/Majalah', 'Pinjam Novel', 'Cari Referensi Skripsi',
            'Diskusi Kelompok', 'Pelatihan Perpustakaan', 'Lomba Pustaka'
        ];

        $yangDicariOptions = [
            'Buku Matematika', 'Novel Fiksi', 'Buku Sejarah', 'Kamus Bahasa Inggris',
            'Buku Pemrograman', 'Ensiklopedia', 'Buku Biologi', 'Karya Sastra',
            'Buku Ekonomi', 'Majalah Sains', 'Buku Psikologi', 'Koran Harian',
            'Buku Seni Budaya', 'Referensi Skripsi', 'Buku Anak-anak', 'Buku Agama',
            'Buku Kewirausahaan', 'Buku Teknik', 'Buku Kedokteran', 'Buku Hukum'
        ];

        $saranMasukanOptions = [
            'Koleksi buku sangat lengkap',
            'Pelayanan sangat memuaskan',
            'Ruangan nyaman dan bersih',
            'Staff sangat membantu',
            'Wifi cepat dan stabil',
            'Tolong tambah koleksi buku terbaru',
            'Jam operasional bisa diperpanjang',
            'Fasilitas AC perlu diperbaiki',
            'Kursi membaca sangat nyaman',
            'Lokasi strategis dan mudah dijangkau',
            'Proses peminjaman cepat',
            'Sistem pencarian buku mudah',
            'Kebersihan toilet perlu ditingkatkan',
            'Tambah koleksi ebook',
            'Acara bedah buku sangat bermanfaat',
            null, null, null, null, null
        ];

        $pengunjungData = [];

        for ($i = 0; $i < 100; $i++) {
            $nama = $namaLengkap[array_rand($namaLengkap)];
            $jenisKelaminValue = $jenisKelamin[array_rand($jenisKelamin)];
            $usia = rand(15, 60);
            $keperluan = $keperluanOptions[array_rand($keperluanOptions)];
            $yangDicari = rand(0, 1) ? $yangDicariOptions[array_rand($yangDicariOptions)] : null;
            $saranMasukan = $saranMasukanOptions[array_rand($saranMasukanOptions)];
            $daysAgo = rand(0, 90);
            $tanggalKunjungan = Carbon::now()->subDays($daysAgo);

            $jamKunjungan = sprintf("%02d:%02d", rand(8, 16), rand(0, 59));

            $pengunjungData[] = [
                'nama_lengkap' => $nama,
                'jenis_kelamin' => $jenisKelaminValue,
                'usia' => $usia,
                'keperluan' => $keperluan,
                'yang_dicari' => $yangDicari,
                'saran_masukan' => $saranMasukan,
                'tanggal_kunjungan' => $tanggalKunjungan->toDateString(),
                'jam_kunjungan' => $jamKunjungan,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Pengunjung::insert($pengunjungData);

        $this->command->info('Berhasil menambahkan 100 data pengunjung!');
    }
}
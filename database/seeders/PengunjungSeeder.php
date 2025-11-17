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

        $currentYear = Carbon::now()->year;
        
        for ($i = 0; $i < 5260; $i++) {
            $nama = $namaLengkap[array_rand($namaLengkap)];
            $jenisKelaminValue = $jenisKelamin[array_rand($jenisKelamin)];
            $usia = rand(15, 60);
            $keperluan = $keperluanOptions[array_rand($keperluanOptions)];
            $yangDicari = rand(0, 1) ? $yangDicariOptions[array_rand($yangDicariOptions)] : null;
            $saranMasukan = $saranMasukanOptions[array_rand($saranMasukanOptions)];
            
            $month = $this->getRandomMonthWithSeasonalPattern();
            $daysInMonth = Carbon::create($currentYear, $month, 1)->daysInMonth;
            $day = rand(1, $daysInMonth);
            $tanggalKunjungan = Carbon::create($currentYear, $month, $day);

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
    }

    /**
     * Generate bulan dengan pola musiman yang natural
     * - Bulan akademik (Jan-Mar, Jul-Sep) lebih padat
     * - Bulan ujian (Apr, Nov) sangat padat  
     * - Bulan libur (Jun, Des) lebih sepi
     */
    private function getRandomMonthWithSeasonalPattern(): int
    {
        $weights = [
            1 => 90,   // Jan - awal semester
            2 => 85,   // Feb - semester aktif
            3 => 95,   // Mar - mendekati ujian
            4 => 120,  // Apr - ujian semester
            5 => 70,   // Mei - setelah ujian
            6 => 50,   // Jun - libur semester
            7 => 100,  // Jul - awal semester baru
            8 => 95,   // Aug - semester aktif
            9 => 90,   // Sep - kegiatan akademik
            10 => 80,  // Oct - pertengahan semester
            11 => 110, // Nov - ujian semester
            12 => 60   // Des - libur akhir tahun
        ];

        $totalWeight = array_sum($weights);
        $random = rand(1, $totalWeight);
        
        $current = 0;
        foreach ($weights as $month => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $month;
            }
        }
        
        return rand(1, 12);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukuData = [
            [
                'judul_buku' => 'Laskar Pelangi',
                'pengarang' => 'Andrea Hirata',
                'tahun_terbit' => 2005,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 529
            ],
            [
                'judul_buku' => 'Bumi Manusia',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1980,
                'penerbit' => 'Hasta Mitra',
                'jumlah_halaman' => 535
            ],
            [
                'judul_buku' => 'Filosofi Kopi',
                'pengarang' => 'Dee Lestari',
                'tahun_terbit' => 2006,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 240
            ],
            [
                'judul_buku' => 'Negeri 5 Menara',
                'pengarang' => 'Ahmad Fuadi',
                'tahun_terbit' => 2009,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 416
            ],
            [
                'judul_buku' => 'Pulang',
                'pengarang' => 'Leila S. Chudori',
                'tahun_terbit' => 2012,
                'penerbit' => 'Kepustakaan Populer Gramedia',
                'jumlah_halaman' => 496
            ],
            [
                'judul_buku' => 'Ronggeng Dukuh Paruk',
                'pengarang' => 'Ahmad Tohari',
                'tahun_terbit' => 1982,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 320
            ],
            [
                'judul_buku' => 'Perahu Kertas',
                'pengarang' => 'Dee Lestari',
                'tahun_terbit' => 2009,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 444
            ],
            [
                'judul_buku' => 'Sang Pemimpi',
                'pengarang' => 'Andrea Hirata',
                'tahun_terbit' => 2006,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 292
            ],
            [
                'judul_buku' => 'Ayat-Ayat Cinta',
                'pengarang' => 'Habiburrahman El Shirazy',
                'tahun_terbit' => 2004,
                'penerbit' => 'Republika',
                'jumlah_halaman' => 418
            ],
            [
                'judul_buku' => 'Cantik Itu Luka',
                'pengarang' => 'Eka Kurniawan',
                'tahun_terbit' => 2002,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 560
            ],
            [
                'judul_buku' => 'Edensor',
                'pengarang' => 'Andrea Hirata',
                'tahun_terbit' => 2007,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'Maryamah Karpov',
                'pengarang' => 'Andrea Hirata',
                'tahun_terbit' => 2008,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 512
            ],
            [
                'judul_buku' => 'Padang Bulan',
                'pengarang' => 'Andrea Hirata',
                'tahun_terbit' => 2010,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 392
            ],
            [
                'judul_buku' => 'Anak Semua Bangsa',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1980,
                'penerbit' => 'Hasta Mitra',
                'jumlah_halaman' => 424
            ],
            [
                'judul_buku' => 'Jejak Langkah',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1985,
                'penerbit' => 'Hasta Mitra',
                'jumlah_halaman' => 488
            ],
            [
                'judul_buku' => 'Rumah Kaca',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1988,
                'penerbit' => 'Hasta Mitra',
                'jumlah_halaman' => 536
            ],
            [
                'judul_buku' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh',
                'pengarang' => 'Dee Lestari',
                'tahun_terbit' => 2001,
                'penerbit' => 'Truedee Books',
                'jumlah_halaman' => 352
            ],
            [
                'judul_buku' => 'Supernova: Akar',
                'pengarang' => 'Dee Lestari',
                'tahun_terbit' => 2002,
                'penerbit' => 'Truedee Books',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'Rectoverso',
                'pengarang' => 'Dee Lestari',
                'tahun_terbit' => 2008,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 280
            ],
            [
                'judul_buku' => 'Madre',
                'pengarang' => 'Dee Lestari',
                'tahun_terbit' => 2011,
                'penerbit' => 'Bentang Pustaka',
                'jumlah_halaman' => 456
            ],
            [
                'judul_buku' => 'Atheis',
                'pengarang' => 'Achdiat K. Mihardja',
                'tahun_terbit' => 1949,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 248
            ],
            [
                'judul_buku' => 'Salah Asuhan',
                'pengarang' => 'Abdoel Moeis',
                'tahun_terbit' => 1928,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 216
            ],
            [
                'judul_buku' => 'Siti Nurbaya',
                'pengarang' => 'Marah Rusli',
                'tahun_terbit' => 1922,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 292
            ],
            [
                'judul_buku' => 'Layar Terkembang',
                'pengarang' => 'Sutan Takdir Alisjahbana',
                'tahun_terbit' => 1936,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 184
            ],
            [
                'judul_buku' => 'Belenggu',
                'pengarang' => 'Armijn Pane',
                'tahun_terbit' => 1940,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 156
            ],
            [
                'judul_buku' => 'Keluarga Gerilya',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1950,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 208
            ],
            [
                'judul_buku' => 'Burung-Burung Manyar',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1981,
                'penerbit' => 'Djambatan',
                'jumlah_halaman' => 324
            ],
            [
                'judul_buku' => 'Roro Mendut',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1983,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 288
            ],
            [
                'judul_buku' => 'Arus Balik',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1995,
                'penerbit' => 'Hasta Mitra',
                'jumlah_halaman' => 672
            ],
            [
                'judul_buku' => 'Gadis Pantai',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1987,
                'penerbit' => 'Hasta Mitra',
                'jumlah_halaman' => 224
            ],
            [
                'judul_buku' => 'Jalan Tak Ada Ujung',
                'pengarang' => 'Mochtar Lubis',
                'tahun_terbit' => 1952,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 196
            ],
            [
                'judul_buku' => 'Senja di Jakarta',
                'pengarang' => 'Mochtar Lubis',
                'tahun_terbit' => 1970,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 264
            ],
            [
                'judul_buku' => 'Harimau! Harimau!',
                'pengarang' => 'Mochtar Lubis',
                'tahun_terbit' => 1975,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 228
            ],
            [
                'judul_buku' => 'Kering',
                'pengarang' => 'Mochtar Lubis',
                'tahun_terbit' => 1972,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 180
            ],
            [
                'judul_buku' => 'Maut dan Cinta',
                'pengarang' => 'Mochtar Lubis',
                'tahun_terbit' => 1977,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 212
            ],
            [
                'judul_buku' => 'Perburuan',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1950,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 172
            ],
            [
                'judul_buku' => 'Keluarga Permana',
                'pengarang' => 'Ramadhan K.H.',
                'tahun_terbit' => 1978,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 256
            ],
            [
                'judul_buku' => 'Saman',
                'pengarang' => 'Ayu Utami',
                'tahun_terbit' => 1998,
                'penerbit' => 'Kapustakaan Populer Gramedia',
                'jumlah_halaman' => 224
            ],
            [
                'judul_buku' => 'Larung',
                'pengarang' => 'Ayu Utami',
                'tahun_terbit' => 2001,
                'penerbit' => 'Kapustakaan Populer Gramedia',
                'jumlah_halaman' => 280
            ],
            [
                'judul_buku' => 'Bilangan Fu',
                'pengarang' => 'Ayu Utami',
                'tahun_terbit' => 2008,
                'penerbit' => 'Kapustakaan Populer Gramedia',
                'jumlah_halaman' => 472
            ],
            [
                'judul_buku' => 'Manjali dan Cakrabirawa',
                'pengarang' => 'Ayu Utami',
                'tahun_terbit' => 2010,
                'penerbit' => 'Kapustakaan Populer Gramedia',
                'jumlah_halaman' => 392
            ],
            [
                'judul_buku' => 'Cerita Cinta Enrico',
                'pengarang' => 'Ayu Utami',
                'tahun_terbit' => 2012,
                'penerbit' => 'Kapustakaan Populer Gramedia',
                'jumlah_halaman' => 328
            ],
            [
                'judul_buku' => '9 Summers 10 Autumns',
                'pengarang' => 'Iwan Setyawan',
                'tahun_terbit' => 2011,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 264
            ],
            [
                'judul_buku' => 'Negeri Para Bedebah',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2012,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'Rindu',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2014,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 432
            ],
            [
                'judul_buku' => 'Pulang',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2015,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 416
            ],
            [
                'judul_buku' => 'Pergi',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2018,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 392
            ],
            [
                'judul_buku' => 'Hujan',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2016,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 320
            ],
            [
                'judul_buku' => 'Bumi',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2014,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 440
            ],
            [
                'judul_buku' => 'Bulan',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2015,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 424
            ],
            [
                'judul_buku' => 'Matahari',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2016,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 408
            ],
            [
                'judul_buku' => 'Bintang',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2017,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 392
            ],
            [
                'judul_buku' => 'Komet',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2018,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 376
            ],
            [
                'judul_buku' => 'Nebula',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2019,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 360
            ],
            [
                'judul_buku' => 'Selena',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2020,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 344
            ],
            [
                'judul_buku' => 'Negeri Di Ujung Tanduk',
                'pengarang' => 'Tere Liye',
                'tahun_terbit' => 2013,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 368
            ],
            [
                'judul_buku' => 'Sepotong Senja untuk Pacarku',
                'pengarang' => 'Seno Gumira Ajidarma',
                'tahun_terbit' => 1997,
                'penerbit' => 'Pustaka Firdaus',
                'jumlah_halaman' => 192
            ],
            [
                'judul_buku' => 'Kitab Omong Kosong',
                'pengarang' => 'Seno Gumira Ajidarma',
                'tahun_terbit' => 2003,
                'penerbit' => 'Pustaka Firdaus',
                'jumlah_halaman' => 216
            ],
            [
                'judul_buku' => 'Atas Nama Malam',
                'pengarang' => 'Seno Gumira Ajidarma',
                'tahun_terbit' => 2006,
                'penerbit' => 'Pustaka Firdaus',
                'jumlah_halaman' => 240
            ],
            [
                'judul_buku' => 'Jazz, Parfum, dan Insiden',
                'pengarang' => 'Seno Gumira Ajidarma',
                'tahun_terbit' => 2009,
                'penerbit' => 'Pustaka Firdaus',
                'jumlah_halaman' => 264
            ],
            [
                'judul_buku' => 'Dilarang Menyanyi di Kamar Mandi',
                'pengarang' => 'Seno Gumira Ajidarma',
                'tahun_terbit' => 2011,
                'penerbit' => 'Pustaka Firdaus',
                'jumlah_halaman' => 288
            ],
            [
                'judul_buku' => 'Penari-penari Birahi',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1998,
                'penerbit' => 'Pustaka Firdaus',
                'jumlah_halaman' => 204
            ],
            [
                'judul_buku' => 'Bila Malam Bertambah Malam',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1971,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 176
            ],
            [
                'judul_buku' => 'Bom',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1978,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 188
            ],
            [
                'judul_buku' => 'Pabrik',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1976,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 192
            ],
            [
                'judul_buku' => 'Stasiun',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1977,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 184
            ],
            [
                'judul_buku' => 'Keok',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1978,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 196
            ],
            [
                'judul_buku' => 'Blok',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1977,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 200
            ],
            [
                'judul_buku' => 'Aduh',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1975,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 180
            ],
            [
                'judul_buku' => 'Dag Dig Dug',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1976,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 172
            ],
            [
                'judul_buku' => 'Gerr',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1974,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 168
            ],
            [
                'judul_buku' => 'Yel',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1973,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 164
            ],
            [
                'judul_buku' => 'Sah',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1977,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 176
            ],
            [
                'judul_buku' => 'Los',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1976,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 188
            ],
            [
                'judul_buku' => 'Amping',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1975,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 192
            ],
            [
                'judul_buku' => 'Sobat',
                'pengarang' => 'Putu Wijaya',
                'tahun_terbit' => 1974,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 184
            ],
            [
                'judul_buku' => 'Sepatu Dahlan',
                'pengarang' => 'Khrisna Pabichara',
                'tahun_terbit' => 2012,
                'penerbit' => 'Noura Books',
                'jumlah_halaman' => 376
            ],
            [
                'judul_buku' => 'Tenggelamnya Kapal Van der Wijck',
                'pengarang' => 'Hamka',
                'tahun_terbit' => 1938,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 274
            ],
            [
                'judul_buku' => 'Di Bawah Lindungan Ka bah',
                'pengarang' => 'Hamka',
                'tahun_terbit' => 1938,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 248
            ],
            [
                'judul_buku' => 'Merantau ke Deli',
                'pengarang' => 'Hamka',
                'tahun_terbit' => 1939,
                'penerbit' => 'Balai Pustaka',
                'jumlah_halaman' => 192
            ],
            [
                'judul_buku' => 'Khotbah di Atas Bukit',
                'pengarang' => 'Kuntowijoyo',
                'tahun_terbit' => 1976,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 168
            ],
            [
                'judul_buku' => 'Musafir',
                'pengarang' => 'Joko Pinurbo',
                'tahun_terbit' => 2017,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 120
            ],
            [
                'judul_buku' => 'Lelaki Harimau',
                'pengarang' => 'Eka Kurniawan',
                'tahun_terbit' => 2004,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 304
            ],
            [
                'judul_buku' => 'Seperti Dendam Rindu Harus Dibayar Tuntas',
                'pengarang' => 'Eka Kurniawan',
                'tahun_terbit' => 2014,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 536
            ],
            [
                'judul_buku' => 'O',
                'pengarang' => 'Eka Kurniawan',
                'tahun_terbit' => 2016,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 320
            ],
            [
                'judul_buku' => 'Pikiran Orang Indonesia',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1982,
                'penerbit' => 'Djambatan',
                'jumlah_halaman' => 216
            ],
            [
                'judul_buku' => 'Burung-Burung Rantau',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1982,
                'penerbit' => 'Djambatan',
                'jumlah_halaman' => 280
            ],
            [
                'judul_buku' => 'Ikan-Ikan Hiu, Ido, Homa',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1983,
                'penerbit' => 'Djambatan',
                'jumlah_halaman' => 264
            ],
            [
                'judul_buku' => 'Durga Umayi',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1991,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 232
            ],
            [
                'judul_buku' => 'Rara Mendut',
                'pengarang' => 'Y.B. Mangunwijaya',
                'tahun_terbit' => 1982,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 192
            ],
            [
                'judul_buku' => 'Soulmate',
                'pengarang' => 'Sapardi Djoko Damono',
                'tahun_terbit' => 2018,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 144
            ],
            [
                'judul_buku' => 'Hujan Bulan Juni',
                'pengarang' => 'Sapardi Djoko Damono',
                'tahun_terbit' => 2015,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 96
            ],
            [
                'judul_buku' => 'Trilogi Soekram',
                'pengarang' => 'Sapardi Djoko Damono',
                'tahun_terbit' => 2019,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 328
            ],
            [
                'judul_buku' => 'Politik',
                'pengarang' => 'Sapardi Djoko Damono',
                'tahun_terbit' => 2020,
                'penerbit' => 'Gramedia Pustaka Utama',
                'jumlah_halaman' => 152
            ],
            [
                'judul_buku' => 'Namaku Hiroko',
                'pengarang' => 'NH. Dini',
                'tahun_terbit' => 1977,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 208
            ],
            [
                'judul_buku' => 'La Barka',
                'pengarang' => 'NH. Dini',
                'tahun_terbit' => 1975,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 192
            ],
            [
                'judul_buku' => 'Keberangkatan',
                'pengarang' => 'NH. Dini',
                'tahun_terbit' => 1977,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 184
            ],
            [
                'judul_buku' => 'Padang Ilalang di Belakang Rumah',
                'pengarang' => 'NH. Dini',
                'tahun_terbit' => 1979,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 176
            ],
            [
                'judul_buku' => 'Pada Sebuah Kapal',
                'pengarang' => 'NH. Dini',
                'tahun_terbit' => 1973,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 168
            ],
            [
                'judul_buku' => 'Pertemuan Dua Hati',
                'pengarang' => 'NH. Dini',
                'tahun_terbit' => 1986,
                'penerbit' => 'Pustaka Jaya',
                'jumlah_halaman' => 200
            ],
            [
                'judul_buku' => 'Kisah 1001 Malam',
                'pengarang' => 'Antologi Sastra Arab',
                'tahun_terbit' => 1706,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 872
            ],
            [
                'judul_buku' => 'Robinson Crusoe',
                'pengarang' => 'Daniel Defoe',
                'tahun_terbit' => 1719,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 320
            ],
            [
                'judul_buku' => 'Oliver Twist',
                'pengarang' => 'Charles Dickens',
                'tahun_terbit' => 1838,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'Great Expectations',
                'pengarang' => 'Charles Dickens',
                'tahun_terbit' => 1861,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 544
            ],
            [
                'judul_buku' => 'Pride and Prejudice',
                'pengarang' => 'Jane Austen',
                'tahun_terbit' => 1813,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 432
            ],
            [
                'judul_buku' => 'Wuthering Heights',
                'pengarang' => 'Emily Brontë',
                'tahun_terbit' => 1847,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 416
            ],
            [
                'judul_buku' => 'Jane Eyre',
                'pengarang' => 'Charlotte Brontë',
                'tahun_terbit' => 1847,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 532
            ],
            [
                'judul_buku' => 'Moby Dick',
                'pengarang' => 'Herman Melville',
                'tahun_terbit' => 1851,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 635
            ],
            [
                'judul_buku' => 'The Adventures of Huckleberry Finn',
                'pengarang' => 'Mark Twain',
                'tahun_terbit' => 1884,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 366
            ],
            [
                'judul_buku' => 'The Great Gatsby',
                'pengarang' => 'F. Scott Fitzgerald',
                'tahun_terbit' => 1925,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 218
            ],
            [
                'judul_buku' => 'To Kill a Mockingbird',
                'pengarang' => 'Harper Lee',
                'tahun_terbit' => 1960,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 324
            ],
            [
                'judul_buku' => '1984',
                'pengarang' => 'George Orwell',
                'tahun_terbit' => 1949,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 328
            ],
            [
                'judul_buku' => 'Animal Farm',
                'pengarang' => 'George Orwell',
                'tahun_terbit' => 1945,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 112
            ],
            [
                'judul_buku' => 'Brave New World',
                'pengarang' => 'Aldous Huxley',
                'tahun_terbit' => 1932,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 288
            ],
            [
                'judul_buku' => 'The Catcher in the Rye',
                'pengarang' => 'J.D. Salinger',
                'tahun_terbit' => 1951,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 234
            ],
            [
                'judul_buku' => 'Lord of the Flies',
                'pengarang' => 'William Golding',
                'tahun_terbit' => 1954,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 224
            ],
            [
                'judul_buku' => 'The Hobbit',
                'pengarang' => 'J.R.R. Tolkien',
                'tahun_terbit' => 1937,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 310
            ],
            [
                'judul_buku' => 'The Lord of the Rings',
                'pengarang' => 'J.R.R. Tolkien',
                'tahun_terbit' => 1954,
                'penerbit' => 'Penerbit Sastra Dunia',
                'jumlah_halaman' => 1178
            ],
            [
                'judul_buku' => 'Harry Potter and the Philosopher Stone',
                'pengarang' => 'J.K. Rowling',
                'tahun_terbit' => 1997,
                'penerbit' => 'Bloomsbury Publishing',
                'jumlah_halaman' => 332
            ],
            [
                'judul_buku' => 'Harry Potter and the Chamber of Secrets',
                'pengarang' => 'J.K. Rowling',
                'tahun_terbit' => 1998,
                'penerbit' => 'Bloomsbury Publishing',
                'jumlah_halaman' => 352
            ],
            [
                'judul_buku' => 'Harry Potter and the Prisoner of Azkaban',
                'pengarang' => 'J.K. Rowling',
                'tahun_terbit' => 1999,
                'penerbit' => 'Bloomsbury Publishing',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'The Alchemist',
                'pengarang' => 'Paulo Coelho',
                'tahun_terbit' => 1988,
                'penerbit' => 'HarperCollins',
                'jumlah_halaman' => 208
            ],
            [
                'judul_buku' => 'The Little Prince',
                'pengarang' => 'Antoine de Saint-Exupéry',
                'tahun_terbit' => 1943,
                'penerbit' => 'Reynal & Hitchcock',
                'jumlah_halaman' => 96
            ],
            [
                'judul_buku' => 'One Hundred Years of Solitude',
                'pengarang' => 'Gabriel García Márquez',
                'tahun_terbit' => 1967,
                'penerbit' => 'Harper & Row',
                'jumlah_halaman' => 417
            ],
            [
                'judul_buku' => 'Love in the Time of Cholera',
                'pengarang' => 'Gabriel García Márquez',
                'tahun_terbit' => 1985,
                'penerbit' => 'Penguin Books',
                'jumlah_halaman' => 348
            ],
            [
                'judul_buku' => 'The Kite Runner',
                'pengarang' => 'Khaled Hosseini',
                'tahun_terbit' => 2003,
                'penerbit' => 'Riverhead Books',
                'jumlah_halaman' => 371
            ],
            [
                'judul_buku' => 'A Thousand Splendid Suns',
                'pengarang' => 'Khaled Hosseini',
                'tahun_terbit' => 2007,
                'penerbit' => 'Riverhead Books',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'The Da Vinci Code',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 2003,
                'penerbit' => 'Doubleday',
                'jumlah_halaman' => 454
            ],
            [
                'judul_buku' => 'Angels & Demons',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 2000,
                'penerbit' => 'Pocket Books',
                'jumlah_halaman' => 496
            ],

            // Buku 131-160
            [
                'judul_buku' => 'Digital Fortress',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 1998,
                'penerbit' => 'St. Martin Press',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'Deception Point',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 2001,
                'penerbit' => 'Pocket Books',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'The Lost Symbol',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 2009,
                'penerbit' => 'Doubleday',
                'jumlah_halaman' => 528
            ],
            [
                'judul_buku' => 'Inferno',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 2013,
                'penerbit' => 'Doubleday',
                'jumlah_halaman' => 480
            ],
            [
                'judul_buku' => 'Origin',
                'pengarang' => 'Dan Brown',
                'tahun_terbit' => 2017,
                'penerbit' => 'Doubleday',
                'jumlah_halaman' => 480
            ],
            [
                'judul_buku' => 'The Girl with the Dragon Tattoo',
                'pengarang' => 'Stieg Larsson',
                'tahun_terbit' => 2005,
                'penerbit' => 'Norstedts Förlag',
                'jumlah_halaman' => 672
            ],
            [
                'judul_buku' => 'The Girl Who Played with Fire',
                'pengarang' => 'Stieg Larsson',
                'tahun_terbit' => 2006,
                'penerbit' => 'Norstedts Förlag',
                'jumlah_halaman' => 724
            ],
            [
                'judul_buku' => 'The Girl Who Kicked the Hornets Nest',
                'pengarang' => 'Stieg Larsson',
                'tahun_terbit' => 2007,
                'penerbit' => 'Norstedts Förlag',
                'jumlah_halaman' => 602
            ],
            [
                'judul_buku' => 'The Hunger Games',
                'pengarang' => 'Suzanne Collins',
                'tahun_terbit' => 2008,
                'penerbit' => 'Scholastic Press',
                'jumlah_halaman' => 374
            ],
            [
                'judul_buku' => 'Catching Fire',
                'pengarang' => 'Suzanne Collins',
                'tahun_terbit' => 2009,
                'penerbit' => 'Scholastic Press',
                'jumlah_halaman' => 391
            ],
            [
                'judul_buku' => 'Mockingjay',
                'pengarang' => 'Suzanne Collins',
                'tahun_terbit' => 2010,
                'penerbit' => 'Scholastic Press',
                'jumlah_halaman' => 390
            ],
            [
                'judul_buku' => 'Twilight',
                'pengarang' => 'Stephenie Meyer',
                'tahun_terbit' => 2005,
                'penerbit' => 'Little, Brown and Company',
                'jumlah_halaman' => 498
            ],
            [
                'judul_buku' => 'New Moon',
                'pengarang' => 'Stephenie Meyer',
                'tahun_terbit' => 2006,
                'penerbit' => 'Little, Brown and Company',
                'jumlah_halaman' => 563
            ],
            [
                'judul_buku' => 'Eclipse',
                'pengarang' => 'Stephenie Meyer',
                'tahun_terbit' => 2007,
                'penerbit' => 'Little, Brown and Company',
                'jumlah_halaman' => 629
            ],
            [
                'judul_buku' => 'Breaking Dawn',
                'pengarang' => 'Stephenie Meyer',
                'tahun_terbit' => 2008,
                'penerbit' => 'Little, Brown and Company',
                'jumlah_halaman' => 756
            ],
            [
                'judul_buku' => 'The Fault in Our Stars',
                'pengarang' => 'John Green',
                'tahun_terbit' => 2012,
                'penerbit' => 'Dutton Books',
                'jumlah_halaman' => 313
            ],
            [
                'judul_buku' => 'Looking for Alaska',
                'pengarang' => 'John Green',
                'tahun_terbit' => 2005,
                'penerbit' => 'Dutton Books',
                'jumlah_halaman' => 221
            ],
            [
                'judul_buku' => 'Paper Towns',
                'pengarang' => 'John Green',
                'tahun_terbit' => 2008,
                'penerbit' => 'Dutton Books',
                'jumlah_halaman' => 305
            ],
            [
                'judul_buku' => 'An Abundance of Katherines',
                'pengarang' => 'John Green',
                'tahun_terbit' => 2006,
                'penerbit' => 'Dutton Books',
                'jumlah_halaman' => 227
            ],
            [
                'judul_buku' => 'Divergent',
                'pengarang' => 'Veronica Roth',
                'tahun_terbit' => 2011,
                'penerbit' => 'Katherine Tegen Books',
                'jumlah_halaman' => 487
            ],
            [
                'judul_buku' => 'Insurgent',
                'pengarang' => 'Veronica Roth',
                'tahun_terbit' => 2012,
                'penerbit' => 'Katherine Tegen Books',
                'jumlah_halaman' => 525
            ],
            [
                'judul_buku' => 'Allegiant',
                'pengarang' => 'Veronica Roth',
                'tahun_terbit' => 2013,
                'penerbit' => 'Katherine Tegen Books',
                'jumlah_halaman' => 526
            ],
            [
                'judul_buku' => 'Four: A Divergent Collection',
                'pengarang' => 'Veronica Roth',
                'tahun_terbit' => 2014,
                'penerbit' => 'Katherine Tegen Books',
                'jumlah_halaman' => 304
            ],
            [
                'judul_buku' => 'The Maze Runner',
                'pengarang' => 'James Dashner',
                'tahun_terbit' => 2009,
                'penerbit' => 'Delacorte Press',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'The Scorch Trials',
                'pengarang' => 'James Dashner',
                'tahun_terbit' => 2010,
                'penerbit' => 'Delacorte Press',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'The Death Cure',
                'pengarang' => 'James Dashner',
                'tahun_terbit' => 2011,
                'penerbit' => 'Delacorte Press',
                'jumlah_halaman' => 352
            ],
            [
                'judul_buku' => 'The Kill Order',
                'pengarang' => 'James Dashner',
                'tahun_terbit' => 2012,
                'penerbit' => 'Delacorte Press',
                'jumlah_halaman' => 368
            ],
            [
                'judul_buku' => 'The Fever Code',
                'pengarang' => 'James Dashner',
                'tahun_terbit' => 2016,
                'penerbit' => 'Delacorte Press',
                'jumlah_halaman' => 368
            ],
            [
                'judul_buku' => 'Gone Girl',
                'pengarang' => 'Gillian Flynn',
                'tahun_terbit' => 2012,
                'penerbit' => 'Crown Publishing Group',
                'jumlah_halaman' => 432
            ],
            [
                'judul_buku' => 'Sharp Objects',
                'pengarang' => 'Gillian Flynn',
                'tahun_terbit' => 2006,
                'penerbit' => 'Shaye Areheart Books',
                'jumlah_halaman' => 254
            ],
            [
                'judul_buku' => 'Dark Places',
                'pengarang' => 'Gillian Flynn',
                'tahun_terbit' => 2009,
                'penerbit' => 'Shaye Areheart Books',
                'jumlah_halaman' => 349
            ],
            [
                'judul_buku' => 'The Girl on the Train',
                'pengarang' => 'Paula Hawkins',
                'tahun_terbit' => 2015,
                'penerbit' => 'Riverhead Books',
                'jumlah_halaman' => 336
            ],
            [
                'judul_buku' => 'Into the Water',
                'pengarang' => 'Paula Hawkins',
                'tahun_terbit' => 2017,
                'penerbit' => 'Riverhead Books',
                'jumlah_halaman' => 386
            ],
            [
                'judul_buku' => 'The Silent Patient',
                'pengarang' => 'Alex Michaelides',
                'tahun_terbit' => 2019,
                'penerbit' => 'Celadon Books',
                'jumlah_halaman' => 336
            ],
            [
                'judul_buku' => 'The Maidens',
                'pengarang' => 'Alex Michaelides',
                'tahun_terbit' => 2021,
                'penerbit' => 'Celadon Books',
                'jumlah_halaman' => 352
            ],
            [
                'judul_buku' => 'Where the Crawdads Sing',
                'pengarang' => 'Delia Owens',
                'tahun_terbit' => 2018,
                'penerbit' => 'G.P. Putnam Sons',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'The Seven Husbands of Evelyn Hugo',
                'pengarang' => 'Taylor Jenkins Reid',
                'tahun_terbit' => 2017,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 400
            ],
            [
                'judul_buku' => 'Daisy Jones & The Six',
                'pengarang' => 'Taylor Jenkins Reid',
                'tahun_terbit' => 2019,
                'penerbit' => 'Ballantine Books',
                'jumlah_halaman' => 368
            ],
            [
                'judul_buku' => 'Malibu Rising',
                'pengarang' => 'Taylor Jenkins Reid',
                'tahun_terbit' => 2021,
                'penerbit' => 'Ballantine Books',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'The Midnight Library',
                'pengarang' => 'Matt Haig',
                'tahun_terbit' => 2020,
                'penerbit' => 'Canongate Books',
                'jumlah_halaman' => 304
            ],
            [
                'judul_buku' => 'The Invisible Life of Addie LaRue',
                'pengarang' => 'V.E. Schwab',
                'tahun_terbit' => 2020,
                'penerbit' => 'Tor Books',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'Project Hail Mary',
                'pengarang' => 'Andy Weir',
                'tahun_terbit' => 2021,
                'penerbit' => 'Ballantine Books',
                'jumlah_halaman' => 496
            ],
            [
                'judul_buku' => 'The Martian',
                'pengarang' => 'Andy Weir',
                'tahun_terbit' => 2011,
                'penerbit' => 'Crown Publishing Group',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'Artemis',
                'pengarang' => 'Andy Weir',
                'tahun_terbit' => 2017,
                'penerbit' => 'Crown Publishing Group',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'A Man Called Ove',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2012,
                'penerbit' => 'Washington Square Press',
                'jumlah_halaman' => 337
            ],
            [
                'judul_buku' => 'Anxious People',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2019,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 352
            ],
            [
                'judul_buku' => 'Beartown',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2016,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 432
            ],
            [
                'judul_buku' => 'Us Against You',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2018,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'The Winners',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2022,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 688
            ],
            [
                'judul_buku' => 'My Grandmother Asked Me to Tell You She s Sorry',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2015,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 372
            ],
            [
                'judul_buku' => 'Britt-Marie Was Here',
                'pengarang' => 'Fredrik Backman',
                'tahun_terbit' => 2016,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 336
            ],
            [
                'judul_buku' => 'The Thursday Murder Club',
                'pengarang' => 'Richard Osman',
                'tahun_terbit' => 2020,
                'penerbit' => 'Penguin Books',
                'jumlah_halaman' => 400
            ],
            [
                'judul_buku' => 'The Man Who Died Twice',
                'pengarang' => 'Richard Osman',
                'tahun_terbit' => 2021,
                'penerbit' => 'Penguin Books',
                'jumlah_halaman' => 432
            ],
            [
                'judul_buku' => 'The Bullet That Missed',
                'pengarang' => 'Richard Osman',
                'tahun_terbit' => 2022,
                'penerbit' => 'Penguin Books',
                'jumlah_halaman' => 400
            ],
            [
                'judul_buku' => 'The Last Thing He Told Me',
                'pengarang' => 'Laura Dave',
                'tahun_terbit' => 2021,
                'penerbit' => 'Simon & Schuster',
                'jumlah_halaman' => 320
            ],
            [
                'judul_buku' => 'The Paris Apartment',
                'pengarang' => 'Lucy Foley',
                'tahun_terbit' => 2022,
                'penerbit' => 'William Morrow',
                'jumlah_halaman' => 368
            ],
            [
                'judul_buku' => 'The Guest List',
                'pengarang' => 'Lucy Foley',
                'tahun_terbit' => 2020,
                'penerbit' => 'William Morrow',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'The Hunting Party',
                'pengarang' => 'Lucy Foley',
                'tahun_terbit' => 2019,
                'penerbit' => 'William Morrow',
                'jumlah_halaman' => 400
            ],
            [
                'judul_buku' => 'The Sanatorium',
                'pengarang' => 'Sarah Pearse',
                'tahun_terbit' => 2021,
                'penerbit' => 'Pamela Dorman Books',
                'jumlah_halaman' => 400
            ],
            [
                'judul_buku' => 'The Retreat',
                'pengarang' => 'Sarah Pearse',
                'tahun_terbit' => 2022,
                'penerbit' => 'Pamela Dorman Books',
                'jumlah_halaman' => 384
            ],

            // Buku 191-200 (10 buku terakhir)
            [
                'judul_buku' => 'Verity',
                'pengarang' => 'Colleen Hoover',
                'tahun_terbit' => 2018,
                'penerbit' => 'Grand Central Publishing',
                'jumlah_halaman' => 336
            ],
            [
                'judul_buku' => 'It Ends With Us',
                'pengarang' => 'Colleen Hoover',
                'tahun_terbit' => 2016,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'It Starts With Us',
                'pengarang' => 'Colleen Hoover',
                'tahun_terbit' => 2022,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 336
            ],
            [
                'judul_buku' => 'Ugly Love',
                'pengarang' => 'Colleen Hoover',
                'tahun_terbit' => 2014,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 352
            ],
            [
                'judul_buku' => 'November 9',
                'pengarang' => 'Colleen Hoover',
                'tahun_terbit' => 2015,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 320
            ],
            [
                'judul_buku' => 'The Love Hypothesis',
                'pengarang' => 'Ali Hazelwood',
                'tahun_terbit' => 2021,
                'penerbit' => 'Berkley Books',
                'jumlah_halaman' => 384
            ],
            [
                'judul_buku' => 'Love on the Brain',
                'pengarang' => 'Ali Hazelwood',
                'tahun_terbit' => 2022,
                'penerbit' => 'Berkley Books',
                'jumlah_halaman' => 368
            ],
            [
                'judul_buku' => 'The Spanish Love Deception',
                'pengarang' => 'Elena Armas',
                'tahun_terbit' => 2021,
                'penerbit' => 'Atria Books',
                'jumlah_halaman' => 448
            ],
            [
                'judul_buku' => 'Book Lovers',
                'pengarang' => 'Emily Henry',
                'tahun_terbit' => 2022,
                'penerbit' => 'Berkley Books',
                'jumlah_halaman' => 400
            ],
            [
                'judul_buku' => 'People We Meet on Vacation',
                'pengarang' => 'Emily Henry',
                'tahun_terbit' => 2021,
                'penerbit' => 'Berkley Books',
                'jumlah_halaman' => 384
            ]
        ];

        foreach ($bukuData as $buku) {
            Buku::create($buku);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama_lengkap' => 'Admin Perpus',
            'email' => 'admin@perpus.com',
            'password' => Hash::make('password'),
            'foto' => null,
        ]);

        $admins = [
            [
                'nama_lengkap' => 'Ahmad Fauzi',
                'email' => 'ahmadfauzi' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Siti Rahayu',
                'email' => 'sitirahayu' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Budi Santoso',
                'email' => 'budisantoso' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Maya Sari',
                'email' => 'mayasari' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Rizki Pratama',
                'email' => 'rizkipratama' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Dewi Anggraini',
                'email' => 'dewianggraini' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Hendra Wijaya',
                'email' => 'hendrawijaya' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Linda Permata',
                'email' => 'lindapermata' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Fajar Nugroho',
                'email' => 'fajarnugroho' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Rina Marlina',
                'email' => 'rinamarlina' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Eko Prasetyo',
                'email' => 'ekoprasetyo' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Anisa Fitriani',
                'email' => 'anisafitriani' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Joko Susilo',
                'email' => 'jokosusilo' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Melia Putri',
                'email' => 'meliaputri' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Dodi Hermawan',
                'email' => 'dodihermawan' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Nur Hasanah',
                'email' => 'nurhasanah' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Rudi Hartono',
                'email' => 'rudihartono' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Wulan Sari',
                'email' => 'wulansari' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ],
            [
                'nama_lengkap' => 'Toni Setiawan',
                'email' => 'tonisetiawan' . rand(10, 99) . '@perpus.com',
                'password' => Hash::make('password'),
                'foto' => null,
            ]
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
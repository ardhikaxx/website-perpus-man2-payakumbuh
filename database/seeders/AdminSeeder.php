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
    }
}
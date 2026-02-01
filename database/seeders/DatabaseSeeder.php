<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Kategori;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // buat model terlebih dahulu
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('12345'), // pastikan untuk mengenkripsi password
        ]);

        Kategori::create([
        'ket_kategori' => 'Bahan mudah pecah, alat sekolah kayu'
    ]);

    // data awal siswa / dummy
    Siswa::create([
        'nis' => '1234567890',
        'kelas' => 'XII RPL 5',
        'nama' => 'Ahmad Mozi'
    ]);

     Siswa::create([
        'nis' => '1234321321',
        'kelas' => 'XII RPL 5',
        'nama' => 'Wowo'
    ]);

    }
}

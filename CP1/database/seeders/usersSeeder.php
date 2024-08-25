<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembuatan akun dengan role akun

        $now = Carbon::now();

        $superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('makansiangbang'),
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('makansiangbang'),
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $admin->assignRole('admin');

        $pengguna = User::create([
            'name' => 'pengguna',
            'email' => 'pengguna@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('makansiangbang'),
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $pengguna->assignRole('pengguna');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user yang mungkin sudah ada dengan email yang sama untuk menghindari error
        User::where('email', 'admin@promosindo.com')->delete();

        // Buat akun admin baru
        User::create([
            'name' => 'AdminPromosindo',
            'email' => 'admin@promosindo.com', // Ganti dengan email admin Anda
            'password' => Hash::make('promosindo123'), // GANTI DENGAN PASSWORD YANG AMAN
            'role' => 'admin',
            'email_verified_at' => now(), // Langsung verifikasi email
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::where('email', 'admin@promosindo.com')->delete();

        User::create([
            'name' => 'AdminPromosindo',
            'email' => 'admin@promosindo.com',
            'password' => Hash::make('promosindo123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}

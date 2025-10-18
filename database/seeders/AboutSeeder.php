<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel About.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Who We Are',
            'description' => 'Ini adalah deskripsi default tentang perusahaan Anda. Anda bisa mengubah teks ini dari panel admin.',
            'image' => 'images/template/default-about.jpg',
            'counter1_value' => 1539,
            'counter1_label' => 'Projects',
            'counter2_value' => 3653,
            'counter2_label' => 'Employees',
            'counter3_value' => 5987,
            'counter3_label' => 'Constructor',
            'counter4_value' => 3999,
            'counter4_label' => 'Partners',
        ]);
    }
}
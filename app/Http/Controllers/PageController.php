<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\About;

class PageController extends Controller
{
    /**
     * Menampilkan halaman Home/Profil.
     */
    public function home(): View
    {
        return view('profile');
    }

    /**
     * Menampilkan halaman Project dengan data dari database.
     */
    public function project(): View
    {
        $projects = Project::latest()->get();
        return view('project', compact('projects'));
    }

    /**
     * Menampilkan halaman About dengan data dari database.
     */
    public function about(): View
    {
        // Ambil data pertama dari tabel 'abouts', jika tidak ada tampilkan fallback
        $about = About::first() ?? new About([
            'title' => 'Who We Are',
            'description' => 'Deskripsi belum tersedia. Silakan tambahkan dari panel admin.',
            'image' => 'images/template/default-about.jpg',
            'counter1_value' => 0,
            'counter1_label' => 'Projects',
            'counter2_value' => 0,
            'counter2_label' => 'Employees',
            'counter3_value' => 0,
            'counter3_label' => 'Constructor',
            'counter4_value' => 0,
            'counter4_label' => 'Partners',
        ]);

        return view('about', compact('about'));
    }

    /**
     * Menampilkan halaman Services.
     */
    public function services(): View
    {
        return view('services');
    }

    /**
     * Menampilkan halaman Blog.
     */
    public function blog(): View
    {
        return view('blog');
    }

    /**
     * Menampilkan halaman Contact.
     */
    public function contact(): View
    {
        return view('contact');
    }
}
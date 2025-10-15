<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Menampilkan halaman Home/Profil.
     */
    public function home(): View
    {
        return view('profile'); // Menggunakan view profile.blade.php yang sudah dibuat
    }

    /**
     * Menampilkan halaman Project.
     */
    public function project(): View
    {
        return view('project');
    }

    /**
     * Menampilkan halaman About.
     */
    public function about(): View
    {
        return view('about');
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
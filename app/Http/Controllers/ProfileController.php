<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil perusahaan.
     */
    public function index(): View
    {
        return view('profile');
    }
}
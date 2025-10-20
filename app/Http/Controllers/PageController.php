<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\About;
use App\Models\Service; // ✅ Tambah model Service

class PageController extends Controller
{
    public function home(): View
    {
        return view('profile');
    }

    public function project(): View
    {
        $projects = Project::latest()->paginate(6);
        return view('project', compact('projects'));
    }

    public function about(): View
    {
        $about = About::first() ?? new About([
            'title' => 'Who We Are',
            'description' => 'Deskripsi belum tersedia. Silakan tambahkan dari panel admin.',
            'image' => 'images/template/default-about.jpg',
            'counter1_value' => 1370,
            'counter1_label' => 'Projects',
            'counter2_value' => 3251,
            'counter2_label' => 'Employees',
            'counter3_value' => 5328,
            'counter3_label' => 'Constructor',
            'counter4_value' => 3559,
            'counter4_label' => 'Partners',
        ]);

        return view('partials.about', compact('about'));
    }

    public function services(): View
    {
        // ✅ Ambil data dari database langsung
        $services = Service::orderBy('id', 'desc')->get();
        $categories = ['Semua', 'Outdoor', 'Indoor', 'Multi'];
        return view('partials.services', compact('services', 'categories'));
    }

    public function blog(): View
    {
        return view('partials.blog');
    }

    public function contact(): View
    {
        return view('partials.contact');
    }
}

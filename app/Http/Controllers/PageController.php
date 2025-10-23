<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\About;
use App\Models\Service;
use App\Models\News;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // ==========================
    // HALAMAN HOME (ONE-PAGE)
    // ==========================
    public function home(): View
    {
        // About untuk teks singkat + hero
        $about = About::first() ?? new About([
            'title' => 'An Inspiring Built Space',
            'subtitle' => '100% HTML5 Bootstrap Templates Made by Colorlib.com',
            'description' => 'Template modern dengan desain bersih dan profesional.',
            'hero_image' => 'template/images/cover_img_1.jpg'
        ]);

        // Data ringkas untuk preview di Home
        $projects = Project::latest()->take(6)->get();
        $services = Service::orderBy('id', 'desc')->take(6)->get();
        $news     = News::latest()->take(3)->get()->map(function ($item) {
            if (empty($item->excerpt)) {
                $item->excerpt = Str::limit(strip_tags($item->content), 150);
            }
            $item->image = $item->image && file_exists(public_path($item->image))
                ? $item->image
                : 'template/images/default.jpg';
            return $item;
        });

        // View one-page scroll (home)
        return view('profile', compact('about', 'projects', 'services', 'news'));
    }

    // ==========================
    // HALAMAN PROJECT
    // ==========================
    public function project(): View
    {
        $projects = Project::latest()->paginate(6);
        return view('partials.project', compact('projects'));
    }

    // ==========================
    // HALAMAN ABOUT
    // ==========================
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

    // ==========================
    // HALAMAN SERVICES
    // ==========================
    public function services(): View
    {
        $services   = Service::orderBy('id', 'desc')->get();
        $categories = ['Semua', 'Outdoor', 'Indoor', 'Multi'];
        return view('partials.services', compact('services', 'categories'));
    }

    // ==========================
    // HALAMAN BLOG (LIST)
    // ==========================
    public function blog(): View
    {
        $news = News::latest()->paginate(6);

        $news->transform(function ($item) {
            if (empty($item->excerpt)) {
                $item->excerpt = Str::limit(strip_tags($item->content), 150);
            }

            $item->image = $item->image && file_exists(public_path($item->image))
                ? $item->image
                : 'template/images/default.jpg';

            return $item;
        });

        return view('partials.blog', compact('news'));
    }

    // ==========================
    // HALAMAN DETAIL BLOG
    // ==========================
    public function blogDetail($slug): View
    {
        $news = News::where('slug', $slug)->first();
        if (!$news) {
            $news = News::where('id', $slug)->firstOrFail();
        }

        $news->image = $news->image && file_exists(public_path($news->image))
            ? $news->image
            : 'template/images/default.jpg';

        $related = News::where('id', '!=', $news->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($item) {
                $item->image = $item->image && file_exists(public_path($item->image))
                    ? $item->image
                    : 'template/images/default.jpg';
                return $item;
            });

        return view('partials.blog-detail', compact('news', 'related'));
    }

    // ==========================
    // HALAMAN KONTAK
    // ==========================
    public function contact(): View
    {
        return view('partials.contact');
    }
}

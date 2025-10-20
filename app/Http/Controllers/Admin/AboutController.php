<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Menampilkan formulir edit halaman About.
     */
    public function edit(): View
    {
        // Ambil data pertama, atau buat default jika belum ada
        $about = About::firstOrCreate(
            [],
            [
                'title' => 'Tentang Kami',
                'description' => 'Isi deskripsi singkat perusahaan Anda di sini.',
                'image' => 'images/template/default-about.jpg',
                'hero_image' => 'images/template/default-hero.jpg',
                'counter_bg' => 'images/template/default-counter-bg.jpg',
                'counter1_value' => 0,
                'counter1_label' => 'Projects',
                'counter2_value' => 0,
                'counter2_label' => 'Clients',
                'counter3_value' => 0,
                'counter3_label' => 'Employees',
                'counter4_value' => 0,
                'counter4_label' => 'Partners',
            ]
        );

        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Memperbarui data halaman About.
     */
    public function update(Request $request)
    {
        $about = About::first() ?? new About();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',

            // Gambar
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'counter_bg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            // Counter
            'counter1_value' => 'nullable|integer|min:0',
            'counter1_label' => 'nullable|string|max:255',
            'counter2_value' => 'nullable|integer|min:0',
            'counter2_label' => 'nullable|string|max:255',
            'counter3_value' => 'nullable|integer|min:0',
            'counter3_label' => 'nullable|string|max:255',
            'counter4_value' => 'nullable|integer|min:0',
            'counter4_label' => 'nullable|string|max:255',
        ]);

        // Upload hero image (gambar di kiri)
        if ($request->hasFile('hero_image')) {
            if ($about->hero_image && Storage::disk('public')->exists($about->hero_image)) {
                Storage::disk('public')->delete($about->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('abouts', 'public');
        }

        // Upload counter background (gambar belakang counter)
        if ($request->hasFile('counter_bg')) {
            if ($about->counter_bg && Storage::disk('public')->exists($about->counter_bg)) {
                Storage::disk('public')->delete($about->counter_bg);
            }
            $validated['counter_bg'] = $request->file('counter_bg')->store('abouts', 'public');
        }

        // Upload image lama (fallback, jika masih dipakai)
        if ($request->hasFile('image')) {
            if ($about->image && $about->image !== 'images/template/default-about.jpg') {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('abouts', 'public');
        }

        // Simpan semua perubahan
        $about->fill($validated)->save();

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'Halaman About berhasil diperbarui!');
    }
}

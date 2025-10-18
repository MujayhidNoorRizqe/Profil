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
        $about = About::firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'counter1_value' => 'nullable|integer|min:0',
            'counter1_label' => 'nullable|string|max:255',
            'counter2_value' => 'nullable|integer|min:0',
            'counter2_label' => 'nullable|string|max:255',
            'counter3_value' => 'nullable|integer|min:0',
            'counter3_label' => 'nullable|string|max:255',
            'counter4_value' => 'nullable|integer|min:0',
            'counter4_label' => 'nullable|string|max:255',
        ]);

        // Jika ada file baru, hapus gambar lama dan simpan baru
        if ($request->hasFile('image')) {
            if ($about->image && $about->image !== 'images/template/default-about.jpg') {
                Storage::disk('public')->delete($about->image);
            }

            $validated['image'] = $request->file('image')->store('abouts', 'public');
        }

        $about->update($validated);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'Halaman About berhasil diperbarui!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use App\Models\HomeSlide;

class HomeController extends Controller
{
    public function index()
    {
        $home = HomeContent::first();
        $slides = HomeSlide::orderBy('id', 'desc')->get();
        return view('admin.home.index', compact('home', 'slides'));
    }

    public function update(Request $request)
    {
        $home = HomeContent::first() ?? new HomeContent();

        $data = $request->only([
            'about_text',
            'visi_title',
            'visi_text',
            'misi_title',
            'misi_text',
        ]);

        $uploadPath = public_path('uploads/home');

        // Pastikan folder ada
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        // ✅ Upload VISI
        if ($request->hasFile('visi_image')) {
            $request->validate([
                'visi_image' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            ]);

            // Hapus file lama
            if (!empty($home->visi_image) && file_exists(public_path($home->visi_image))) {
                unlink(public_path($home->visi_image));
            }

            $file = $request->file('visi_image');
            $filename = 'visi_' . time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);

            // Simpan path yang bisa langsung dipanggil via asset()
            $data['visi_image'] = 'uploads/home/' . $filename;
        }

        // ✅ Upload MISI
        if ($request->hasFile('misi_image')) {
            $request->validate([
                'misi_image' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            ]);

            if (!empty($home->misi_image) && file_exists(public_path($home->misi_image))) {
                unlink(public_path($home->misi_image));
            }

            $file = $request->file('misi_image');
            $filename = 'misi_' . time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);

            // Simpan path relatif dari public/
            $data['misi_image'] = 'uploads/home/' . $filename;
        }

        $home->fill($data)->save();

        return redirect()->back()->with('success', 'Halaman Home berhasil diperbarui!');
    }

    public function deleteSlide($id)
    {
        $slide = HomeSlide::findOrFail($id);
        if (file_exists(public_path($slide->image))) {
            unlink(public_path($slide->image));
        }
        $slide->delete();

        return redirect()->back()->with('success', 'Gambar slide berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'category' => 'required|string|in:Outdoor,Indoor,Multi',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'icon', 'category']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('services', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Service::create($data);

        return back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function destroy(Service $service)
    {
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}

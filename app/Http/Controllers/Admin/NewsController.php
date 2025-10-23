<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(8);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        $data = $request->only(['title', 'category', 'content']);
        $data['author'] = Auth::check() ? Auth::user()->name : 'Admin';
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150);
        $data['slug'] = Str::slug($request->title . '-' . time());

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/news'), $filename);
            $data['image'] = 'uploads/news/' . $filename;
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', '✅ Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        $data = $request->only(['title', 'category', 'content']);
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150);
        $data['slug'] = Str::slug($request->title . '-' . time());

        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/news'), $filename);
            $data['image'] = 'uploads/news/' . $filename;
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', '✅ Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image));
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', '🗑️ Berita berhasil dihapus!');
    }
}

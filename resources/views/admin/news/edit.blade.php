@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="fw-bold mb-4">✏️ Edit Berita</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $news->category) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Konten</label>
                    <textarea name="content" rows="8" class="form-control" required>{{ old('content', $news->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Sekarang</label><br>
                    @if(!empty($news->image) && file_exists(public_path($news->image)))
                        <img src="{{ asset($news->image) }}" class="rounded border" style="max-height: 150px;">
                    @else
                        <p class="text-muted fst-italic">Belum ada gambar</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Gambar (opsional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

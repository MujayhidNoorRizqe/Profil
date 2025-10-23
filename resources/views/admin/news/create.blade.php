@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="fw-bold mb-4">🆕 Tambah Berita Baru</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Masukkan judul..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="category" value="{{ old('category') }}" class="form-control" placeholder="Misal: Promo, Event">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Konten</label>
                    <textarea name="content" rows="8" class="form-control" placeholder="Tulis isi berita di sini..." required>{{ old('content') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Gambar Utama</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
                    <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP (maks 4MB)</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

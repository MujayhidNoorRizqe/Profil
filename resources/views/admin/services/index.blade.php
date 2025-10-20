@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Kelola Layanan</h2>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Layanan -->
    <div class="card mb-5 p-4 shadow-sm border-0">
        <h5 class="mb-3">Tambah Layanan Baru</h5>
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required placeholder="Contoh: Cetak Spanduk">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi singkat..."></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Icon (Font Awesome)</label>
                <input type="text" name="icon" class="form-control" placeholder="Contoh: fa-bullhorn">
            </div>

            <!-- ✅ Tambahan kategori -->
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Outdoor">Outdoor</option>
                    <option value="Indoor">Indoor</option>
                    <option value="Multi">Multi</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Daftar Services -->
    <div class="card p-4 shadow-sm border-0">
        <h5 class="mb-3">Daftar Layanan</h5>
        <div class="row g-3">
            @forelse($services as $service)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($service->image)
                            <img src="{{ asset($service->image) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas {{ $service->icon ?? 'fa-bullhorn' }}"></i>
                                {{ $service->title }}
                            </h5>
                            <p class="text-muted small mb-1">
                                {{ $service->description }}
                            </p>
                            <span class="badge bg-warning text-dark">
                                {{ $service->category ?? 'Tidak ada kategori' }}
                            </span>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-end">
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada layanan ditambahkan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
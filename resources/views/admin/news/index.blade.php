@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">📰 Daftar Berita</h4>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($news->isEmpty())
        <div class="text-center text-muted py-5">
            <i class="fas fa-newspaper fa-3x mb-3"></i>
            <p>Belum ada berita yang ditambahkan.</p>
        </div>
    @else
    <div class="row">
        @foreach($news as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100 hover-card">
                    <div class="card-img-top" style="height: 180px; background-image: url('{{ asset($item->image ?? 'template/images/event1.jpg') }}'); background-size: cover; background-position: center; border-radius: 8px 8px 0 0;"></div>
                    <div class="card-body">
                        <h5 class="fw-bold mb-1 text-dark">{{ Str::limit($item->title, 60) }}</h5>
                        <span class="badge bg-warning text-dark">{{ $item->category ?? 'Umum' }}</span>
                        <p class="text-muted small mt-2">{{ Str::limit($item->excerpt, 100) }}</p>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-3 text-center">
        {{ $news->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

<style>
.hover-card:hover { transform: translateY(-3px); transition: all .3s ease; box-shadow: 0 6px 15px rgba(0,0,0,.1); }
</style>
@endsection

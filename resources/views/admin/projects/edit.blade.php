@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Proyek: {{ $project->title }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Metode HTTP untuk proses Update --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="title">Judul Proyek</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="category">Kategori</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $project->category) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="image">Ganti Gambar Proyek (Opsional)</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                                @if($project->image)
                                    <div class="mt-2">
                                        <p>Gambar Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" width="150">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
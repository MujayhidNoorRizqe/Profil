@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Proyek Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="title">Judul Proyek</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Proyek" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="category">Kategori</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Contoh: Gedung, Rumah, Interior" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan Deskripsi Singkat Proyek" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="image">Gambar Proyek</label>
                                <input class="form-control" type="file" id="image" name="image" required>
                                <small class="form-text text-muted">Unggah gambar utama untuk proyek ini.</small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Proyek</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
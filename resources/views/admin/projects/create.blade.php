@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Tambah Proyek Baru</div>
    <div class="card-body">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="category" class="form-control">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="image" id="image" class="form-control">
                <img id="preview" class="mt-2 rounded" width="200" style="display:none;">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
document.getElementById('image').addEventListener('change', function(e){
    const reader = new FileReader();
    reader.onload = function(e){ 
        const preview = document.getElementById('preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(e.target.files[0]);
});
</script>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
  <h4 class="mb-4">Kelola Halaman Home</h4>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Bagian Visi --}}
    <h5 class="mt-3 fw-bold">Bagian Visi</h5>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Judul Visi</label>
          <input type="text" name="visi_title" value="{{ old('visi_title', $home->visi_title ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi Visi</label>
          <textarea name="visi_text" rows="4" class="form-control">{{ old('visi_text', $home->visi_text ?? '') }}</textarea>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Gambar Latar Visi</label>
          <input type="file" name="visi_image" class="form-control">
          @if(!empty($home->visi_image) && file_exists(public_path($home->visi_image)))
            <img src="{{ asset($home->visi_image) }}" class="img-fluid mt-2 rounded border" style="max-width: 320px;">
          @else
            <p class="text-muted mt-2">Belum ada gambar visi</p>
          @endif
        </div>
      </div>
    </div>

    <hr>

    {{-- Bagian Misi --}}
    <h5 class="mt-3 fw-bold">Bagian Misi</h5>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Judul Misi</label>
          <input type="text" name="misi_title" value="{{ old('misi_title', $home->misi_title ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi Misi</label>
          <textarea name="misi_text" rows="4" class="form-control">{{ old('misi_text', $home->misi_text ?? '') }}</textarea>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Gambar Latar Misi</label>
          <input type="file" name="misi_image" class="form-control">
          @if(!empty($home->misi_image) && file_exists(public_path($home->misi_image)))
            <img src="{{ asset($home->misi_image) }}" class="img-fluid mt-2 rounded border" style="max-width: 320px;">
          @else
            <p class="text-muted mt-2">Belum ada gambar misi</p>
          @endif
        </div>
      </div>
    </div>

    <hr>

    {{-- Bagian Tentang Kami --}}
    <h5 class="mt-3 fw-bold">Bagian Tentang Kami</h5>
    <div class="mb-3">
      <label class="form-label">Deskripsi “Tentang Kami”</label>
      <textarea name="about_text" rows="5" class="form-control">{{ old('about_text', $home->about_text ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
  </form>
</div>
@endsection

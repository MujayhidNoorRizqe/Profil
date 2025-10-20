@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Kelola Konten Halaman About</h5>
      </div>

      <div class="card-body">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Judul --}}
          <div class="form-group mb-3">
            <label class="fw-bold">Judul</label>
            <input type="text" name="title" class="form-control"
              value="{{ old('title', $about->title) }}" required>
          </div>

          {{-- Deskripsi --}}
          <div class="form-group mb-4">
            <label class="fw-bold">Deskripsi</label>
            <textarea id="editor" name="description" class="form-control" rows="5" required>
              {{ old('description', $about->description) }}
            </textarea>
          </div>

          <div class="row">
            {{-- Hero Image --}}
            <div class="col-md-6 mb-4">
              <label class="fw-bold">Gambar Kiri “Who We Are” (Hero Image)</label>
              <input type="file" name="hero_image" id="hero_image" class="form-control">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah.</small>
              @if($about->hero_image)
                <div class="mt-3">
                  <img src="{{ asset('storage/'.$about->hero_image) }}" width="250" class="rounded shadow-sm border">
                </div>
              @endif
            </div>

            {{-- Counter Background --}}
            <div class="col-md-6 mb-4">
              <label class="fw-bold">Gambar Background Counter</label>
              <input type="file" name="counter_bg" id="counter_bg" class="form-control">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah.</small>
              @php $bg = $about->counter_bg ?? $about->image; @endphp
              @if($bg)
                <div class="mt-3">
                  <img src="{{ asset('storage/'.$bg) }}" width="250" class="rounded shadow-sm border">
                </div>
              @endif
            </div>
          </div>

          {{-- Counter --}}
          <hr>
          <h5 class="fw-bold mt-3 mb-3">Counter (Statistik)</h5>
          <div class="row">
            @for ($i = 1; $i <= 4; $i++)
              <div class="col-md-3 mb-3">
                <label>Counter {{ $i }} (Angka)</label>
                <input type="number" class="form-control mb-2" 
                  name="counter{{ $i }}_value"
                  value="{{ old('counter'.$i.'_value', $about->{'counter'.$i.'_value'}) }}">
                <input type="text" class="form-control" 
                  name="counter{{ $i }}_label"
                  placeholder="Label"
                  value="{{ old('counter'.$i.'_label', $about->{'counter'.$i.'_label'}) }}">
              </div>
            @endfor
          </div>

          <div class="text-end mt-4">
            <button type="submit" class="btn btn-success px-4">
              💾 Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- CKEditor --}}
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#editor')).catch(console.error);
</script>
@endpush
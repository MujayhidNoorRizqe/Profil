@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5>Kelola Konten Halaman About</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="form-group mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $about->title) }}" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group mb-3">
                        <label>Deskripsi</label>
                        <textarea id="editor" name="description" class="form-control" rows="5" required>
                            {{ old('description', $about->description) }}
                        </textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group mb-3">
                        <label>Ganti Gambar</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                        @if($about->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $about->image) }}" 
                                     alt="About Image" width="200" class="rounded shadow-sm border">
                            </div>
                        @endif
                    </div>

                    {{-- Counter --}}
                    <h5 class="mt-4">Counter (Statistik)</h5>
                    <div class="row">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label>Counter {{ $i }} (Angka)</label>
                                    <input type="number" class="form-control" 
                                           name="counter{{ $i }}_value"
                                           value="{{ old('counter'.$i.'_value', $about->{'counter'.$i.'_value'}) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Label Counter {{ $i }}</label>
                                    <input type="text" class="form-control" 
                                           name="counter{{ $i }}_label"
                                           value="{{ old('counter'.$i.'_label', $about->{'counter'.$i.'_label'}) }}">
                                </div>
                            </div>
                        @endfor
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">💾 Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- CKEditor 5 (Modern) --}}
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: [
            'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
            '|', 'blockQuote', 'undo', 'redo'
        ],
    })
    .then(editor => {
        console.log('CKEditor initialized:', editor);
    })
    .catch(error => {
        console.error('CKEditor Error:', error);
    });
</script>
@endpush
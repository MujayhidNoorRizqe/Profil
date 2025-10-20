@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Proyek</h5>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Proyek Baru</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" width="100" class="img-fluid rounded">
                                        @else
                                            <small class="text-muted">Tidak ada</small>
                                        @endif
                                    </td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->category ?? '-' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus proyek ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data proyek.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

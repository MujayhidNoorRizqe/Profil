@extends('layouts.admin')

@section('content')
<div class="row">

    <!-- [ Kartu Selamat Datang ] -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Selamat Datang, {{ Auth::user()->name }}!</h5>
            </div>
            <div class="card-body">
                <p>
                    Ini adalah halaman utama Panel Admin Anda. Gunakan menu navigasi di sebelah kiri untuk mulai mengelola konten website profil perusahaan.
                </p>
            </div>
        </div>
    </div>

    <!-- [ Kartu Statistik ] -->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-xl bg-light-primary">
                            <i class="ph-duotone ph-briefcase f-26"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0">Total Proyek</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <h3 class="mb-0">{{ \App\Models\Project::count() }}</h3>
                    <a href="{{ route('admin.projects.index') }}" class="link-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-xl bg-light-success">
                            <i class="ph-duotone ph-envelope-simple f-26"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0">Pesan Belum Dibaca</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <h3 class="mb-0">{{ \App\Models\Message::where('is_read', false)->count() }}</h3>
                    <a href="" class="link-success">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-xl bg-light-warning">
                            <i class="ph-duotone ph-users-three f-26"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0">Total Pengunjung</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <h3 class="mb-0">{{ \App\Models\Visitor::count() }}</h3>
                    <a href="#" class="link-warning">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
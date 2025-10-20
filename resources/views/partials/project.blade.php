@extends('layouts.app')

@section('content')
<div class="colorlib-project">
    <div class="colorlib-narrow-content">
        <div class="row animate-box" data-animate-effect="fadeInLeft">
            <div class="col-md-12 text-center">
                <span class="heading-meta">Projek</span>
                <h2 class="colorlib-heading">Melayani Pembuatan</h2>
                <p class="intro-text">
                    Kami menyediakan berbagai jenis proyek pembuatan media promosi — mulai dari desain, cetak, hingga pemasangan,
                    baik untuk kebutuhan indoor maupun outdoor.
                </p>
            </div>
        </div>

        <div class="row project-gallery">
            @foreach($projects as $project)
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="project-item">
                        <div class="project-thumb" style="background-image: url('{{ asset('uploads/' . $project->thumbnail) }}');"></div>
                        <div class="project-info">
                            <h3>{{ strtoupper($project->judul) }}</h3>
                            <span>{{ ucfirst($project->kategori) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

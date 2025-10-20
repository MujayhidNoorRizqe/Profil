@extends('layouts.app')

@section('content')

{{-- Ambil data dari model --}}
@php
    use App\Models\HomeContent;
    $home = HomeContent::first();

    // === Deteksi dan validasi path gambar VISI ===
    $visiImagePath = $home->visi_image ?? null;
    if ($visiImagePath && file_exists(public_path($visiImagePath))) {
        $visiImage = asset($visiImagePath);
    } else {
        $visiImage = asset('template/images/img_bg_1.jpg');
    }

    // === Deteksi dan validasi path gambar MISI ===
    $misiImagePath = $home->misi_image ?? null;
    if ($misiImagePath && file_exists(public_path($misiImagePath))) {
        $misiImage = asset($misiImagePath);
    } else {
        $misiImage = asset('template/images/img_bg_2.jpg');
    }

    // === Fallback teks aman ===
    $visiTitle = $home->visi_title ?? 'Visi';
    $visiText  = $home->visi_text ?? 'Deskripsi visi belum tersedia.';
    $misiTitle = $home->misi_title ?? 'Misi';
    $misiText  = $home->misi_text ?? 'Deskripsi misi belum tersedia.';
    $aboutText = $home->about_text ?? 'Restu Guru Promosindo adalah penyedia jasa desain, cetak, dan pemasangan media promosi dengan pengalaman bertahun-tahun.';
@endphp

{{-- ===== HERO (VISI & MISI SLIDER) ===== --}}
<div id="colorlib-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            {{-- VISI --}}
            <li style="background-image: url('{{ $visiImage }}');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1>{{ $visiTitle }}</h1>
                                    <h2>{{ $visiText }}</h2>
                                    <p>
                                        <a href="{{ route('project') }}" class="btn btn-primary btn-learn">
                                            Lihat Projek <i class="icon-arrow-right3"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            {{-- MISI --}}
            <li style="background-image: url('{{ $misiImage }}');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1>{{ $misiTitle }}</h1>
                                    <h2>{{ $misiText }}</h2>
                                    <p>
                                        <a href="{{ route('project') }}" class="btn btn-primary btn-learn">
                                            Lihat Projek <i class="icon-arrow-right3"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

{{-- ===== BAGIAN TENTANG KAMI ===== --}}
<div class="colorlib-about">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6">
                <div class="about-img animate-box" data-animate-effect="fadeInLeft"
                     style="background-image: url({{ asset('template/images/img_bg_2.jpg') }});"></div>
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="about-desc">
                    <h2 class="colorlib-heading">Tentang Kami</h2>
                    <p>{{ $aboutText }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.get_in_touch')

@endsection

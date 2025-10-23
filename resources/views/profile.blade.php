@extends('layouts.app')

@section('content')

@php
    use App\Models\HomeContent;
    $home = HomeContent::first();

    $visiImage = ($home && $home->visi_image && file_exists(public_path($home->visi_image)))
        ? asset($home->visi_image) : asset('template/images/cover_img_1.jpg');

    $misiImage = ($home && $home->misi_image && file_exists(public_path($home->misi_image)))
        ? asset($home->misi_image) : asset('template/images/cover_img_2.jpg');

    $visiTitle = $home->visi_title ?? 'Interior Design Studio';
    $visiText  = $home->visi_text  ?? '100% html5 bootstrap templates Made by colorlib.com';
    $misiTitle = $home->misi_title ?? 'Creative & Professional';
    $misiText  = $home->misi_text  ?? 'Kami menghadirkan desain inovatif yang menginspirasi.';
@endphp

{{-- ===== HERO (ID: home) ===== --}}
<div id="home"></div>
<div id="colorlib-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url('{{ $visiImage }}');">
                <div class="overlay"></div>
                <div class="desc-box animate-box" data-animate-effect="fadeInRight">
                    <h1>{{ $visiTitle }}</h1>
                    <h2>{{ $visiText }}</h2>
                    <p><a href="#project" class="btn btn-learn js-scroll">View Project →</a></p>
                </div>
            </li>
            <li style="background-image: url('{{ $misiImage }}');">
                <div class="overlay"></div>
                <div class="desc-box animate-box" data-animate-effect="fadeInRight">
                    <h1>{{ $misiTitle }}</h1>
                    <h2>{{ $misiText }}</h2>
                    <p><a href="#services" class="btn btn-learn js-scroll">Our Services →</a></p>
                </div>
            </li>
        </ul>
    </div>
</div>

{{-- ===== SECTIONS (fragmen khusus Home, tanpa layout) ===== --}}
<section id="project">@include('sections.project')</section>
<section id="about">@include('sections.about')</section>
<section id="services">@include('sections.services')</section>
<section id="blog">@include('sections.blog')</section>
<section id="contact">@include('sections.contact')</section>

@endsection

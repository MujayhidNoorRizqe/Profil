@extends('layouts.app')

@section('content')
<div class="colorlib-about">
    <div class="colorlib-narrow-content">
        <div class="row row-bottom-padded-md">
            <div class="col-md-6">
                <div class="about-img animate-box" data-animate-effect="fadeInLeft"
                    style="background-image: url('{{ $about && $about->image ? asset('storage/' . $about->image) : asset('template/images/default-about.jpg') }}');">
                </div>
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="about-desc">
                    <span class="heading-meta">Welcome</span>
                    <h2 class="colorlib-heading">{{ $about->title ?? 'Tentang Kami' }}</h2>
                    <p>{!! $about && $about->description ? $about->description : 'Deskripsi belum tersedia.' !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($about)
<div id="colorlib-counter" class="colorlib-counters"
    style="background-image: url({{ asset('template/images/cover_bg_1.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-skyline"></i></span>
                <span class="colorlib-counter js-counter" 
                    data-from="0" 
                    data-to="{{ $about->counter1_value ?? 0 }}"
                    data-speed="5000" 
                    data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">{{ $about->counter1_label ?? 'Counter 1' }}</span>
            </div>

            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-engineer"></i></span>
                <span class="colorlib-counter js-counter" 
                    data-from="0" 
                    data-to="{{ $about->counter2_value ?? 0 }}"
                    data-speed="5000" 
                    data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">{{ $about->counter2_label ?? 'Counter 2' }}</span>
            </div>

            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-architect-with-helmet"></i></span>
                <span class="colorlib-counter js-counter" 
                    data-from="0" 
                    data-to="{{ $about->counter3_value ?? 0 }}"
                    data-speed="5000" 
                    data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">{{ $about->counter3_label ?? 'Counter 3' }}</span>
            </div>

            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-worker"></i></span>
                <span class="colorlib-counter js-counter" 
                    data-from="0" 
                    data-to="{{ $about->counter4_value ?? 0 }}"
                    data-speed="5000" 
                    data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">{{ $about->counter4_label ?? 'Counter 4' }}</span>
            </div>
        </div>
    </div>
</div>
@endif

@include('partials.get_in_touch')
@endsection
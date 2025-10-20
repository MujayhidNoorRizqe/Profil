@extends('layouts.app')

@section('content')
<div class="colorlib-about">
  <div class="colorlib-narrow-content">

    {{-- SECTION WHO WE ARE --}}
    <div class="row align-items-center" style="margin-bottom: 60px;"> {{-- ✅ Tambahkan jarak bawah --}}
      {{-- Hero Image --}}
      <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
        @php
          $hero = $about->hero_image 
              ? asset('storage/'.$about->hero_image) 
              : asset('template/images/img-1.jpg');
        @endphp
        <img src="{{ $hero }}" alt="About" 
             class="img-fluid rounded shadow-sm" 
             style="width:100%; height:auto; object-fit:cover;">
      </div>

      {{-- Text --}}
      <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
        <span class="heading-meta">Welcome</span>
        <h2 class="colorlib-heading">{{ $about->title ?? 'Who We Are' }}</h2>
        <p style="font-size:15px; line-height:1.8; color:#555;">
          {!! $about->description ?? 'Belum ada deskripsi.' !!}
        </p>
      </div>
    </div>

  </div>
</div>

{{-- SECTION COUNTER (PARALLAX) --}}
@php
  $bg = $about->counter_bg ?? $about->image;
  $bgUrl = $bg ? asset('storage/'.$bg) : asset('template/images/cover_img_bg_1.jpg');
@endphp

<section class="colorlib-counter" 
  style="
    background-image:url('{{ $bgUrl }}');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    position:relative;
  ">
  <div class="overlay" style="background:rgba(0,0,0,0.5); position:absolute; top:0; left:0; width:100%; height:100%;"></div>

  <div class="colorlib-narrow-content position-relative" style="z-index:2;">
    <div class="row justify-content-center text-center text-white py-5">

      @php
        $icons = [
          1 => 'fa-building',    // Projects
          2 => 'fa-users',       // Employees
          3 => 'fa-hard-hat',    // Constructor
          4 => 'fa-handshake',   // Partners
        ];
      @endphp

      @for ($i = 1; $i <= 4; $i++)
        @php
          $val = $about->{'counter'.$i.'_value'} ?? 0;
          $lbl = $about->{'counter'.$i.'_label'} ?? '';
          $icon = $icons[$i] ?? 'fa-circle';
        @endphp
        <div class="col-md-3 col-6 mb-4 animate-box" data-animate-effect="fadeInUp">
          <div style="font-size:45px; color:#FFC300; margin-bottom:15px;">
            <i class="fas {{ $icon }}"></i>
          </div>
          <span class="colorlib-counter js-counter d-block" 
                data-from="0" 
                data-to="{{ $val }}" 
                data-speed="3000" 
                data-refresh-interval="50"
                style="font-size:38px; font-weight:700; color:#fff;">
          </span>
          <span class="colorlib-counter-label d-block" style="letter-spacing:1px; color:rgba(255,255,255,0.8);">
            {{ strtoupper($lbl) }}
          </span>
        </div>
      @endfor

    </div>
  </div>
</section>

@include('partials.get_in_touch')
@endsection

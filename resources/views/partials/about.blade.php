@extends('layouts.app')

@section('content')

<div class="colorlib-about">
  <div class="colorlib-narrow-content">

    {{-- ====================== WHO WE ARE ====================== --}}
    <div class="row align-items-center" style="margin-bottom: 80px;">
      
      {{-- Gambar di kiri --}}
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

      {{-- Teks di kanan --}}
      <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
        <span class="heading-meta" style="text-transform:uppercase; letter-spacing:2px;">Welcome</span>
        <h2 class="colorlib-heading" style="font-weight:700; margin-bottom:25px;">
          {{ $about->title ?? 'Who We Are' }}
        </h2>
        <p style="font-size:15px; line-height:1.9; color:#555;">
          {!! $about->description ?? 'Belum ada deskripsi.' !!}
        </p>

        {{-- Nilai perusahaan --}}
        <div class="row mt-4">
          <div class="col-md-4 col-12 mb-3 text-center">
            <div style="width:40px; height:40px; border-radius:50%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; margin:auto; margin-bottom:10px;">
              <i class="fas fa-check text-warning"></i>
            </div>
            <p style="margin:0; font-weight:600; letter-spacing:1px; font-size:13px;">WE ARE<br>PASSIONATE</p>
          </div>
          <div class="col-md-4 col-12 mb-3 text-center">
            <div style="width:40px; height:40px; border-radius:50%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; margin:auto; margin-bottom:10px;">
              <i class="fas fa-check text-warning"></i>
            </div>
            <p style="margin:0; font-weight:600; letter-spacing:1px; font-size:13px;">HONEST<br>DEPENDABLE</p>
          </div>
          <div class="col-md-4 col-12 mb-3 text-center">
            <div style="width:40px; height:40px; border-radius:50%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; margin:auto; margin-bottom:10px;">
              <i class="fas fa-check text-warning"></i>
            </div>
            <p style="margin:0; font-weight:600; letter-spacing:1px; font-size:13px;">ALWAYS<br>IMPROVING</p>
          </div>
        </div>
      </div>
    </div>
    {{-- ====================== END WHO WE ARE ====================== --}}

    {{-- ====================== HISTORY & ACCORDION ====================== --}}
    <div class="row" style="margin-bottom: 90px;">
      
      {{-- HISTORY --}}
      <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
        <h3 class="colorlib-heading" style="font-weight:700; letter-spacing:2px;">HISTORY</h3>
        <div style="width:50px; height:3px; background:#FFC300; margin:10px 0 25px;"></div>
        <p style="font-size:15px; line-height:1.8; color:#555;">
          {!! $about->history ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem nec libero ultrices hendrerit. Donec nec vestibulum odio, in luctus velit.' !!}
        </p>
      </div>

      {{-- ACCORDION --}}
      <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
        <div class="accordion custom-accordion" id="aboutAccordion">

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                WHY CHOOSE ME?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
              <div class="accordion-body fade-slide">
                Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                WHAT I DO?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
              <div class="accordion-body fade-slide">
                Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts.
                <ul style="margin-top:10px;">
                  <li>Separated they live in Bookmarksgrove right</li>
                  <li>Separated they live in Bookmarksgrove right</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                MY SPECIALTIES
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
              <div class="accordion-body fade-slide">
                A small river named Duden flows by their place and supplies it with the necessary regelialia.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>


{{-- ====================== COUNTER SECTION ====================== --}}
@php
  $bg = $about->counter_bg ?? $about->image;
  $bgUrl = $bg ? asset('storage/'.$bg) : asset('template/images/cover_img_bg_1.jpg');
@endphp

<section class="colorlib-counter" 
  style="background-image:url('{{ $bgUrl }}');
         background-size:cover;
         background-position:center;
         background-attachment:fixed;
         position:relative;">
  <div class="overlay" 
       style="background:rgba(0,0,0,0.55); position:absolute; top:0; left:0; width:100%; height:100%;">
  </div>

  <div class="colorlib-narrow-content position-relative" style="z-index:2;">
    <div class="row justify-content-center text-center text-white py-5">
      @php
        $icons = [
          1 => 'fa-building',
          2 => 'fa-users',
          3 => 'fa-hard-hat',
          4 => 'fa-handshake',
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
          <span class="colorlib-counter-label d-block" 
                style="letter-spacing:1px; color:rgba(255,255,255,0.8);">
            {{ strtoupper($lbl) }}
          </span>
        </div>
      @endfor
    </div>
  </div>
</section>


@include('partials.get_in_touch')

{{-- ====================== CUSTOM STYLING ====================== --}}
<style>
.custom-accordion .accordion-button {
  background-color: #f9f9f9;
  border: none;
  box-shadow: none;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 13px;
  letter-spacing: 1px;
  color: #444;
  padding: 15px 20px;
  transition: all 0.3s ease;
}
.custom-accordion .accordion-button:not(.collapsed) {
  background-color: #000;
  color: #fff;
}
.custom-accordion .accordion-item {
  border: 1px solid #eee;
  margin-bottom: 8px;
  transition: all 0.3s ease;
}
.custom-accordion .accordion-item:hover {
  transform: translateY(-2px);
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}
.custom-accordion .accordion-body {
  background: #fff;
  color: #555;
  font-size: 14px;
  line-height: 1.8;
  padding: 20px;
  border-top: 1px solid #eee;
  transition: all 0.4s ease;
  opacity: 0;
}
.custom-accordion .accordion-collapse.show .accordion-body {
  opacity: 1;
}
.custom-accordion .accordion-button:focus {
  box-shadow: none;
}
.custom-accordion .accordion-button::after {
  filter: brightness(0) invert(0.4);
  transition: transform 0.3s ease;
}
.custom-accordion .accordion-button:not(.collapsed)::after {
  filter: invert(1);
  transform: rotate(180deg);
}

/* Animasi fade-slide konten */
.fade-slide {
  animation: fadeSlide 0.4s ease forwards;
}
@keyframes fadeSlide {
  0% {opacity: 0; transform: translateY(10px);}
  100% {opacity: 1; transform: translateY(0);}
}
</style>

@endsection
@extends('layouts.app')

@section('content')

@php
  // Fallback aman bila view dipanggil dari HOME tanpa data dari controller
  $categories = $categories ?? ['Semua', 'Outdoor', 'Indoor', 'Multi'];
  $services   = $services   ?? collect();
@endphp

<div class="colorlib-services py-5">
  <div class="colorlib-narrow-content">
    <div class="text-center mb-5">
      <span class="heading-meta text-uppercase d-block mb-2">Our Services</span>
      <h2 class="colorlib-heading fw-bold mb-3" style="font-size: 32px;">Layanan Kami</h2>
      <p class="text-muted" style="max-width: 680px; margin: 0 auto;">
        Kami menyediakan berbagai layanan untuk mendukung kebutuhan promosi dan branding bisnis Anda
        dengan hasil yang profesional dan berkelas.
      </p>
    </div>

    <div class="filter-group text-center mb-5">
      @foreach ($categories as $label)
        <button class="btn-filter {{ $loop->first ? 'active' : '' }}" data-filter="{{ strtolower($label) }}">
          {{ ucfirst($label) }}
        </button>
      @endforeach
    </div>

    <div id="services-gallery" class="service-grid">
      @forelse ($services as $service)
        @php
          $img     = !empty($service->image) ? asset($service->image) : asset('template/images/default.jpg');
          $catSlug = strtolower($service->category ?? 'semua');
          $catDisp = ucfirst($service->category ?? 'Umum');
          $title   = $service->title ?? 'Tanpa Judul';
          $desc    = $service->description ?? '';
        @endphp

        <div class="service-item" data-category="{{ $catSlug }}">
          <div class="service-card"
               data-img="{{ $img }}"
               data-title="{{ e($title) }}"
               data-desc="{{ e($desc) }}"
               onclick="openModal(this.dataset.img, this.dataset.title, this.dataset.desc)">
            <div class="service-image">
              <img src="{{ $img }}" alt="{{ $title }}">
              <span class="badge-category">{{ $catDisp }}</span>
            </div>
            <div class="service-content">
              <h5 class="service-title">{{ $title }}</h5>
              <p class="service-desc">{{ $desc }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center text-muted" style="margin-top: 10px;">
          Belum ada layanan yang ditambahkan.
        </div>
      @endforelse
    </div>
  </div>
</div>

@include('partials.get_in_touch')

<!-- Modal -->
<div id="imageModal" class="modal">
  <span class="close" onclick="closeModal()">&times;</span>
  <img class="modal-content" id="modalImage">
  <div id="caption"></div>
</div>

<style>
/* (style sama seperti versi kamu, tidak diubah) */
</style>

<script>
/* (script sama seperti versi kamu, tidak diubah) */
</script>

@endsection

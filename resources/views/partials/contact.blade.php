@extends('layouts.app')

@section('content')

<div class="colorlib-contact">
  <div class="colorlib-narrow-content">

    {{-- ========== CONTACT HEADER ========== --}}
    <div class="row mb-5">
      <div class="col-md-12 text-center">
        <span class="heading-meta">Get in Touch</span>
        <h2 class="colorlib-heading" style="font-weight:700;">Hubungi Kami</h2>
        <p style="max-width:700px; margin:auto; color:#555;">
          Kami senang mendengar dari Anda. Silakan isi formulir di bawah ini atau hubungi kami melalui informasi kontak yang tersedia.
        </p>
      </div>
    </div>

    {{-- ========== CONTACT CONTENT ========== --}}
    <div class="row g-5 align-items-stretch">

      {{-- MAP --}}
      <div class="col-md-6 mb-4 animate-box" data-animate-effect="fadeInLeft">
        <div style="width:100%; height:400px; border-radius:10px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0000000000005!2d110.00000000000001!3d-7.800000000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a0000000000%3A0x000000000000000!2sRestu%20Guru%20Promosindo!5e0!3m2!1sen!2sid!4v1697799000000!5m2!1sen!2sid" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
          </iframe>
        </div>
      </div>

      {{-- FORM --}}
      <div class="col-md-6 mb-4 animate-box" data-animate-effect="fadeInRight">
        <form action="#" method="POST" class="p-4 shadow-sm bg-white rounded" style="border:1px solid #eee;">
          @csrf
          <div class="mb-3">
            <label class="form-label" style="font-weight:600;">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="mb-3">
            <label class="form-label" style="font-weight:600;">Alamat Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
          </div>
          <div class="mb-3">
            <label class="form-label" style="font-weight:600;">Pesan</label>
            <textarea name="message" rows="5" class="form-control" placeholder="Tulis pesan Anda..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary px-4 py-2" style="background:#ffc300; border:none; color:#000; font-weight:600;">
            Kirim Pesan
          </button>
        </form>
      </div>

    </div>

    {{-- ========== CONTACT INFO ========== --}}
    <div class="row mt-5 text-center">
      <div class="col-md-4 mb-4 animate-box" data-animate-effect="fadeInUp">
        <div style="font-size:30px; color:#FFC300;"><i class="fas fa-map-marker-alt"></i></div>
        <h5 style="font-weight:600; margin-top:10px;">Alamat</h5>
        <p>Jl. Melati No. 45, Kebayoran Baru, Jakarta Selatan</p>
      </div>
      <div class="col-md-4 mb-4 animate-box" data-animate-effect="fadeInUp">
        <div style="font-size:30px; color:#FFC300;"><i class="fas fa-phone"></i></div>
        <h5 style="font-weight:600; margin-top:10px;">Telepon</h5>
        <p>+62 812 3456 7890</p>
      </div>
      <div class="col-md-4 mb-4 animate-box" data-animate-effect="fadeInUp">
        <div style="font-size:30px; color:#FFC300;"><i class="fas fa-envelope"></i></div>
        <h5 style="font-weight:600; margin-top:10px;">Email</h5>
        <p>info@restugurupromosindo.com</p>
      </div>
    </div>

  </div>
</div>

<style>
  .colorlib-contact .form-control {
    border-radius: 6px;
    border: 1px solid #ccc;
    box-shadow: none;
    font-size: 14px;
  }
  .colorlib-contact .form-control:focus {
    border-color: #FFC300;
    box-shadow: 0 0 4px rgba(255,195,0,0.5);
  }
  .colorlib-contact button:hover {
    background:#000 !important;
    color:#fff !important;
  }
</style>

@endsection

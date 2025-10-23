<div class="colorlib-about" style="padding:3.5em 0 2em;">
  <div class="colorlib-narrow-content">
    <div class="row align-items-center">
      <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
        @php
          $hero = $about->hero_image ? asset('storage/'.$about->hero_image) : asset('template/images/img_bg_2.jpg');
        @endphp
        <div style="background-image:url('{{ $hero }}');height:320px;border-radius:10px;background-size:cover;background-position:center;"></div>
      </div>
      <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
        <h2 class="colorlib-heading" style="display:flex;align-items:center;gap:12px;">
          <span>Tentang Kami</span>
          <span style="display:inline-block;width:50px;height:3px;background:#f9bf3f;"></span>
        </h2>
        <p style="color:#555">
          {!! $about->description ?? 'Restu Guru Promosindo adalah penyedia jasa desain, cetak, dan pemasangan media promosi.' !!}
        </p>
        <a href="{{ route('about') }}" class="btn btn-learn">Pelajari Selengkapnya →</a>
      </div>
    </div>
  </div>
</div>

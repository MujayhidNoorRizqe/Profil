<div class="colorlib-services" style="padding:3.5em 0 2em;">
  <div class="colorlib-narrow-content">
    <div class="row">
      <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta">Services</span>
        <h2 class="colorlib-heading" style="display:flex;align-items:center;gap:12px;">
          <span>Layanan Kami</span>
          <span style="display:inline-block;width:60px;height:3px;background:#f9bf3f;"></span>
        </h2>
        <p class="text-muted" style="max-width:680px">
          Kami menyediakan layanan desain, produksi, hingga pemasangan media promosi untuk kebutuhan bisnis Anda.
        </p>
        <p class="mt-3">
          <a href="{{ route('services') }}" class="btn btn-learn">Lihat Semua Layanan →</a>
        </p>
      </div>
    </div>

    <div class="row">
      @forelse(($services ?? []) as $s)
        @php
          $img   = !empty($s->image) ? asset($s->image) : asset('template/images/default.jpg');
          $title = $s->title ?? 'Tanpa Judul';
          $desc  = Str::limit($s->description ?? '', 90);
        @endphp
        <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInUp" style="margin-bottom:22px;">
          <div class="card" style="border:none;box-shadow:0 4px 20px rgba(0,0,0,0.08);border-radius:12px;overflow:hidden;">
            <div style="height:200px;background-image:url('{{ $img }}');background-size:cover;background-position:center;"></div>
            <div class="card-body text-center">
              <h5 class="mb-2">{{ $title }}</h5>
              <p class="text-muted" style="min-height:44px;">{{ $desc }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-muted">Belum ada layanan.</div>
      @endforelse
    </div>
  </div>
</div>

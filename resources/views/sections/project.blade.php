<div class="colorlib-project" style="padding:4em 0 2em;">
  <div class="colorlib-narrow-content">
    <div class="row animate-box" data-animate-effect="fadeInLeft">
      <div class="col-md-12">
        <span class="heading-meta">Project</span>
        <h2 class="colorlib-heading" style="display:flex;align-items:center;gap:12px;">
          <span>Melayani Pembuatan</span>
          <span style="display:inline-block;width:60px;height:3px;background:#f9bf3f;"></span>
        </h2>
        <p class="text-muted" style="max-width:680px">
          Lihat beragam contoh hasil pekerjaan kami — indoor & outdoor. Klik tombol di bawah untuk melihat semua proyek.
        </p>
        <p class="mt-3">
          <a href="{{ route('project') }}" class="btn btn-primary btn-learn" style="background:#f9bf3f;color:#000;border:none;">
            Lihat Semua Project
          </a>
        </p>
      </div>
    </div>

    <div class="row">
      @forelse($projects ?? [] as $p)
        <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInUp">
          <div class="project-entry" style="margin-bottom:20px;">
            <a href="{{ route('project') }}" class="img d-block" style="height:220px;background:#eee;border-radius:6px;overflow:hidden;
               background-image:url('{{ asset('uploads/' . ($p->thumbnail ?? '')) }}');background-size:cover;background-position:center;"></a>
            <div class="desc">
              <h3 style="margin-top:10px;">{{ strtoupper($p->judul ?? 'Untitled') }}</h3>
              <span class="small text-muted">{{ ucfirst($p->kategori ?? 'Umum') }}</span>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-muted">Belum ada project.</div>
      @endforelse
    </div>
  </div>
</div>

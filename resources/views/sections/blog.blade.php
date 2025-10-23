<div class="colorlib-blog" style="padding:3.5em 0 2em;">
  <div class="colorlib-narrow-content">
    <div class="row">
      <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta">Blog</span>
        <h2 class="colorlib-heading" style="display:flex;align-items:center;gap:12px;">
          <span>Read Blog</span>
          <span style="display:inline-block;width:60px;height:3px;background:#f9bf3f;"></span>
        </h2>
        <p class="text-muted" style="max-width:680px">
          Info promo & event terbaru dari Restu Guru Promosindo.
        </p>
        <a href="{{ route('blog') }}" class="btn btn-learn">Baca Selengkapnya →</a>
      </div>
    </div>

    <div class="row" style="margin-top:20px;">
      @forelse(($news ?? []) as $item)
        <div class="col-md-4 mb-4 animate-box" data-animate-effect="fadeInUp">
          <div class="blog-entry" style="border:none;overflow:hidden;background:#fff;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);">
            <a href="{{ route('blog.detail', $item->slug ?? $item->id) }}" class="d-block" style="overflow:hidden;">
              <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid"
                   style="width:100%;height:220px;object-fit:cover;">
            </a>
            <div class="desc pt-3 px-3 pb-3">
              <p class="meta mb-2 text-uppercase" style="font-size:0.8em;color:#aaa;letter-spacing:0.5px;">
                {{ $item->created_at ? $item->created_at->format('F d, Y') : 'Unknown Date' }}
              </p>
              <h4 class="fw-bold mb-2" style="font-size:1.05em;">
                <a href="{{ route('blog.detail', $item->slug ?? $item->id) }}" style="color:#000;text-decoration:none;">
                  {{ Str::limit($item->title, 70) }}
                </a>
              </h4>
              <p style="color:#666;font-size:0.95em;line-height:1.7;">
                {{ Str::limit(strip_tags($item->excerpt ?? $item->content), 110) }}
              </p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-muted">Belum ada berita.</div>
      @endforelse
    </div>

    {{-- NOTE: TIDAK ADA pagination di HOME --}}
  </div>
</div>

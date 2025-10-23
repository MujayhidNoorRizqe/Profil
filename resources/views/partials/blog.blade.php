@extends('layouts.app')

@section('content')
<div class="colorlib-blog" style="padding-left: clamp(20px, 5vw, 80px);">
    <div class="colorlib-narrow-content">

        {{-- ===== Heading ===== --}}
        <div class="row mb-5">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">BLOG</span>
                <h2 class="colorlib-heading">READ BLOG</h2>
                <p class="text-muted">
                    Temukan informasi terbaru seputar promo, event, dan kegiatan Restu Guru Promosindo.
                </p>
                <hr style="width:60px;height:3px;background:#f9bf3f;border:none;margin:10px 0;">
            </div>
        </div>

        {{-- ===== Blog Grid Layout (3 Kolom) ===== --}}
        <div class="row">
            @forelse($news as $item)
                @php
                    $imagePath = null;
                    if (!empty($item->image) && file_exists(public_path($item->image))) {
                        $imagePath = asset($item->image);
                    } elseif (!empty($item->image) && file_exists(public_path('uploads/news/'.$item->image))) {
                        $imagePath = asset('uploads/news/'.$item->image);
                    } else {
                        $imagePath = asset('template/images/default.jpg');
                    }
                @endphp

                <div class="col-md-4 mb-5 animate-box" data-animate-effect="fadeInUp">
                    <div class="blog-entry" style="border:none;overflow:hidden;background:#fff;">
                        
                        {{-- Gambar --}}
                        <a href="{{ route('blog.detail', $item->slug ?? $item->id) }}" 
                           class="d-block" 
                           style="border-radius:5px;overflow:hidden;">
                            <img src="{{ $imagePath }}" alt="{{ $item->title }}" 
                                 class="img-fluid" 
                                 style="width:100%;height:240px;object-fit:cover;transition:all .3s ease;">
                        </a>

                        {{-- Teks --}}
                        <div class="desc pt-3">
                            <p class="meta mb-2 text-uppercase" style="font-size:0.8em;color:#aaa;letter-spacing:0.5px;">
                                {{ $item->created_at ? $item->created_at->format('F d, Y') : 'Unknown Date' }} &nbsp; | &nbsp;
                                {{ $item->category ?? 'General' }}
                            </p>

                            <h4 class="fw-bold mb-2" style="font-size:1.05em;">
                                <a href="{{ route('blog.detail', $item->slug ?? $item->id) }}" 
                                   style="color:#000;text-decoration:none;">
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
                <div class="col-md-12 text-center">
                    <p class="text-muted">Belum ada berita yang ditambahkan.</p>
                </div>
            @endforelse
        </div>

        {{-- ===== Pagination ===== --}}
{{-- ===== Pagination (hanya muncul jika Paginator) ===== --}}
        @if($news instanceof \Illuminate\Pagination\AbstractPaginator)
        <div class="row mt-3">
            <div class="col-md-12 text-center">
            {{ $news->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif
        {{-- ===== Get in Touch Section ===== --}}
        <div class="row mt-5">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <div class="get-in-touch" style="background:#f9f9f9;padding:40px 30px;border-radius:10px;">
                    <h3 style="font-weight:700;">Get in Touch!</h3>
                    <p>Hubungi kami untuk info lebih lanjut mengenai promo atau kerja sama event. Kami siap membantu Anda.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-4 py-2 mt-2">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

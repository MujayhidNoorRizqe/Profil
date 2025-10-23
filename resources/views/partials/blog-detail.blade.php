@extends('layouts.app')

@section('content')
<div class="colorlib-blog">
    <div class="colorlib-narrow-content">

        {{-- ===== Hero Gambar ===== --}}
        <div class="row mb-5">
            <div class="col-md-12 text-center animate-box" data-animate-effect="fadeInUp">
                <div class="blog-img"
                     style="background-image: url('{{ $news->image ? asset($news->image) : asset('template/images/event1.jpg') }}');
                            height: 400px;
                            background-size: cover;
                            background-position: center;
                            border-radius: 10px;">
                </div>
            </div>
        </div>

        {{-- ===== Judul & Meta ===== --}}
        <div class="row mb-4">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">{{ $news->category ?? 'Berita & Event' }}</span>
                <h2 class="colorlib-heading" style="font-weight:700;">{{ $news->title }}</h2>
                <p class="text-muted mb-3">
                    <i class="icon-calendar"></i> {{ $news->created_at ? $news->created_at->format('F j, Y') : now()->format('F j, Y') }}
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <i class="icon-user"></i> {{ $news->author ?? 'Admin' }}
                </p>
            </div>
        </div>

        {{-- ===== Isi Berita ===== --}}
        <div class="row mb-5">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                <div class="blog-content" style="font-size: 17px; line-height: 1.8;">
                    {!! nl2br(e($news->content ?? 'Isi berita belum tersedia.')) !!}
                </div>
            </div>
        </div>

        {{-- ===== Related Berita ===== --}}
        @if($related->count() > 0)
        <div class="row mb-5">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <h3 class="colorlib-heading" style="font-weight:700;">Berita Lainnya</h3>
            </div>

            @foreach($related as $item)
                <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="blog-entry">
                        <a href="{{ route('blog.detail', $item->slug ?? $item->id) }}" class="blog-img"
                           style="background-image: url('{{ $item->image ? asset($item->image) : asset('template/images/event2.jpg') }}');"></a>
                        <div class="desc">
                            <p class="meta">
                                <span><i class="icon-calendar"></i> {{ $item->created_at ? $item->created_at->format('F j, Y') : now()->format('F j, Y') }}</span>
                                <span><i class="icon-user"></i> {{ $item->author ?? 'Admin' }}</span>
                            </p>
                            <h3><a href="{{ route('blog.detail', $item->slug ?? $item->id) }}">{{ $item->title }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        {{-- ===== Get in Touch ===== --}}
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <div class="get-in-touch" style="background: #f9f9f9; padding: 40px 30px; border-radius: 10px;">
                    <h3 style="font-weight: 700;">Get in Touch!</h3>
                    <p>Hubungi kami untuk info lebih lanjut mengenai promo atau kerja sama event. Kami siap membantu Anda.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-4 py-2 mt-2">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

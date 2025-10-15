@extends('layouts.app')

@section('content')
<div class="colorlib-blog">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Blog</span>
                <h2 class="colorlib-heading">Read Blog</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="blog-entry">
                    <a href="#" class="blog-img"><img src="{{ asset('template/images/blog-1.jpg') }}" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
                    <div class="desc">
                        <span><small>April 14, 2018 </small> | <small> Web Design </small></span>
                        <h3><a href="#">Renovating National Gallery</a></h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                </div>
            </div>
            {{-- Tambahkan entry blog lainnya --}}
        </div>
    </div>
</div>

@include('partials.get_in_touch')
@endsection
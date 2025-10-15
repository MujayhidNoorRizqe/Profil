@extends('layouts.app')

@section('content')

<aside id="colorlib-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url({{ asset('template/images/img_bg_1.jpg') }});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1>Visi</h1>
                                    <h2>Lorem ipsum dolor sit amet</h2>
                                    {{-- PERUBAHAN DI BARIS INI --}}
                                    <p><a href="{{ route('project') }}" class="btn btn-primary btn-learn">Lihat Projek<i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url({{ asset('template/images/img_bg_2.jpg') }});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1>Misi</h1>
                                    <h2>Lorem ipsum dolor sit amet</h2>
                                    {{-- PERUBAHAN DI BARIS INI JUGA --}}
                                    <p><a href="{{ route('project') }}" class="btn btn-primary btn-learn">Lihat Projek<i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div class="colorlib-about">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6">
                <div class="about-img animate-box" data-animate-effect="fadeInLeft" style="background-image: url({{ asset('template/images/img_bg_2.jpg') }});">
                </div>
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="about-desc">
                    <span class="heading-meta">Lorem ipsum dolor sit amet</span>
                    <h2 class="colorlib-heading">Lorem ipsum dolor sit amet</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.get_in_touch')

@endsection

@extends('layouts.app')

@section('content')
<div class="colorlib-about">
    <div class="colorlib-narrow-content">
        <div class="row row-bottom-padded-md">
            <div class="col-md-6">
                <div class="about-img animate-box" data-animate-effect="fadeInLeft" style="background-image: url({{ asset('template/images/img_bg_2.jpg') }});">
                </div>
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="about-desc">
                    <span class="heading-meta">Welcome</span>
                    <h2 class="colorlib-heading">Who we are</h2>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-counter" class="colorlib-counters" style="background-image: url({{ asset('template/images/cover_bg_1.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-skyline"></i></span>
                <span class="colorlib-counter js-counter" data-from="0" data-to="1539" data-speed="5000" data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">Projects</span>
            </div>
            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-engineer"></i></span>
                <span class="colorlib-counter js-counter" data-from="0" data-to="3653" data-speed="5000" data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">Employees</span>
            </div>
            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-architect-with-helmet"></i></span>
                <span class="colorlib-counter js-counter" data-from="0" data-to="5987" data-speed="5000" data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">Constructor</span>
            </div>
            <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="flaticon-worker"></i></span>
                <span class="colorlib-counter js-counter" data-from="0" data-to="3999" data-speed="5000" data-refresh-interval="50"></span>
                <span class="colorlib-counter-label">Partners</span>
            </div>
        </div>
    </div>
</div>

@include('partials.get_in_touch')
@endsection

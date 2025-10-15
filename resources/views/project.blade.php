@extends('layouts.app')

@section('content')
<div class="colorlib-work">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Projek</span>
                <h2 class="colorlib-heading">Melayani Pembuatan</h2>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="project" style="background-image: url({{ asset('template/images/img-1.jpg') }});">
                    <div class="desc">
                        <div class="con">
                            <h3><a href="#">Outdoor</a></h3>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                <div class="project" style="background-image: url({{ asset('template/images/img-2.jpg') }});">
                    <div class="desc">
                        <div class="con">
                            <h3><a href="#">Indoor</a></h3>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                <div class="project" style="background-image: url({{ asset('template/images/img-3.jpg') }});">
                    <div class="desc">
                        <div class="con">
                            <h3><a href="#">Multi</a></h3>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('partials.get_in_touch')
@endsection

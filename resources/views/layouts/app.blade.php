<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restu Guru Promosindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- =======================================================
         ORIGINAL COLORLIB TEMPLATE CSS (JANGAN DIHAPUS)
    ======================================================= -->
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('template/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('template/js/modernizr-2.6.2.min.js') }}"></script>

    <!-- Support IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset('template/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>

    <!-- ================== SIDEBAR ================== -->
    <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
        <h1 id="colorlib-logo">
            <a href="{{ route('home') }}">RESTU GURU PROMOSINDO</a>
        </h1>

        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="{{ request()->routeIs('home') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('home') }}">HOME</a>
                </li>
                <li class="{{ request()->routeIs('project') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('project') }}">PROJECT</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('about') }}">ABOUT</a>
                </li>
                <li class="{{ request()->routeIs('services') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('services') }}">SERVICES</a>
                </li>
                <li class="{{ request()->routeIs('blog') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('blog') }}">BLOG</a>
                </li>
                <li class="{{ request()->routeIs('contact') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('contact') }}">CONTACT</a>
                </li>
            </ul>
        </nav>

        <div class="colorlib-footer">
            <p>
                <small>
                    &copy; Copyright 
                    <script>document.write(new Date().getFullYear());</script> 
                    All rights reserved
                </small>
            </p>
            <ul>
                <li><a href="#"><i class="icon-facebook2"></i></a></li>
                <li><a href="#"><i class="icon-twitter2"></i></a></li>
                <li><a href="#"><i class="icon-instagram"></i></a></li>
                <li><a href="#"><i class="icon-linkedin2"></i></a></li>
            </ul>
        </div>
    </aside>
    <!-- ================== /SIDEBAR ================== -->

    <!-- ================== MAIN CONTENT ================== -->
    <div id="colorlib-main">
        @yield('content')
    </div>
    <!-- ================== /MAIN CONTENT ================== -->
</div>

<!-- =======================================================
     ORIGINAL COLORLIB JS
======================================================= -->
<script src="{{ asset('template/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('template/js/sticky-kit.min.js') }}"></script>
<script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

</body>
</html>

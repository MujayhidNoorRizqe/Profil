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

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
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
                @php $isHome = request()->routeIs('home'); @endphp

                <li class="{{ request()->routeIs('home') ? 'colorlib-active' : '' }}">
                    <a href="{{ $isHome ? '#home' : route('home') }}" class="{{ $isHome ? 'js-scroll' : '' }}">HOME</a>
                </li>
                <li class="{{ request()->routeIs('project') ? 'colorlib-active' : '' }}">
                    <a href="{{ $isHome ? '#project' : route('project') }}" class="{{ $isHome ? 'js-scroll' : '' }}">PROJECT</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'colorlib-active' : '' }}">
                    <a href="{{ $isHome ? '#about' : route('about') }}" class="{{ $isHome ? 'js-scroll' : '' }}">ABOUT</a>
                </li>
                <li class="{{ request()->routeIs('services') ? 'colorlib-active' : '' }}">
                    <a href="{{ $isHome ? '#services' : route('services') }}" class="{{ $isHome ? 'js-scroll' : '' }}">SERVICES</a>
                </li>
                <li class="{{ request()->routeIs('blog') ? 'colorlib-active' : '' }}">
                    <a href="{{ $isHome ? '#blog' : route('blog') }}" class="{{ $isHome ? 'js-scroll' : '' }}">BLOG</a>
                </li>
                <li class="{{ request()->routeIs('contact') ? 'colorlib-active' : '' }}">
                    <a href="{{ $isHome ? '#contact' : route('contact') }}" class="{{ $isHome ? 'js-scroll' : '' }}">CONTACT</a>
                </li>
            </ul>
        </nav>

        <div class="colorlib-footer">
            <p><small>&copy; {{ date('Y') }} All rights reserved</small></p>
        </div>
    </aside>

    <!-- ================== MAIN CONTENT ================== -->
    <div id="colorlib-main">
        @yield('content')
    </div>
</div>

<!-- JS -->
<script src="{{ asset('template/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

<script>
    // Smooth scroll hanya aktif di halaman HOME
    document.addEventListener('click', function(e) {
        const a = e.target.closest('a.js-scroll');
        if (!a) return;
        const href = a.getAttribute('href') || '';
        if (href.startsWith('#')) {
            e.preventDefault();
            const target = document.querySelector(href);
            target && target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
</script>
</body>
</html>

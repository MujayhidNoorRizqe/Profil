<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - {{ config('app.name', 'Laravel') }}</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('admin_assets/images/favicon.svg') }}" type="image/x-icon" />

    <!-- [Template CSS] -->
    <link rel="stylesheet" href="{{ asset('admin_assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style-preset.css') }}" />
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
                    <img src="{{ asset('admin_assets/images/logo-dark.svg') }}" alt="logo image" class="logo-lg" />
                    <span class="badge bg-light-success rounded-pill ms-2 theme-version">v1.0</span>
                </a>
            </div>
            <div class="navbar-content">
                <div class="card pc-user-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('admin_assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3 me-2">
                                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                <small>Administrator</small>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-gauge"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Manajemen Konten</label>
                    </li>
                    {{-- === PERBAIKI BAGIAN INI === --}}
                    <li class="pc-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.projects.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-briefcase"></i></span>
                            <span class="pc-mtext">Kelola Proyek</span>
                        </a>
                    </li>
                    {{-- === AKHIR PERBAIKAN === --}}
                    <li class="pc-item">
                        <a href="#" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-identification-card"></i></span>
                            <span class="pc-mtext">Kelola Halaman About</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->

    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('admin_assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar" />
                            <span>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <span class="user-desc">Administrator</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="ph-duotone ph-user-circle"></i>
                                <span>My Profile</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="ph-duotone ph-power"></i>
                                    <span>Logout</span>
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            @yield('content')
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('admin_assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('admin_assets/js/theme.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/feather.min.js') }}"></script>

</body>
</html>
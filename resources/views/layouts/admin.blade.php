<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}" />
</head>
<body>

    <!-- Sidebar -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <!-- Header -->
            <div class="m-header">
                <a href="{{ route('admin.dashboard') }}" class="b-brand d-flex align-items-center">
                    <img src="{{ asset('admin_assets/images/logo-dark.svg') }}" alt="Logo" class="logo-lg"/>
                    <span class="badge bg-light-success rounded-pill ms-2 theme-version">v1.0</span>
                </a>
            </div>

            <!-- Sidebar Menu -->
            <div class="navbar-content">
                <ul class="pc-navbar">

                    <!-- Dashboard -->
                    <li class="pc-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-gauge"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    <!-- Kelola Home -->
                    <li class="pc-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-house-line"></i></span>
                            <span class="pc-mtext">Kelola Home</span>
                        </a>
                    </li>

                    <!-- Kelola Proyek -->
                    <li class="pc-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.projects.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-briefcase"></i></span>
                            <span class="pc-mtext">Kelola Proyek</span>
                        </a>
                    </li>

                    <!-- Kelola About -->
                    <li class="pc-item {{ request()->routeIs('admin.about.edit') ? 'active' : '' }}">
                        <a href="{{ route('admin.about.edit') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-identification-card"></i></span>
                            <span class="pc-mtext">Kelola About</span>
                        </a>
                    </li>
                    <!-- Kelola Services -->
                    <li class="pc-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.services.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-wrench"></i></span>
                            <span class="pc-mtext">Kelola Services</span>
                        </a>
                    </li>
                    <!-- Kelola Blog -->
                    <li class="pc-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.news.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph-duotone ph-newspaper"></i></span>
                            <span class="pc-mtext">Kelola Blog</span>
                        </a>
                    </li>
                    <!-- Logout -->
                    <li class="pc-item">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="pc-link" style="background:none;border:none;padding:0;width:100%;text-align:left;">
                                <span class="pc-micon"><i class="ph-duotone ph-power"></i></span>
                                <span class="pc-mtext text-danger">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pc-container">
        <div class="pc-content">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('admin_assets/js/theme.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Team Management</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/ada.png">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toaster -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

 <style>
    /* Struktur utama */
    body {
        margin: 0;
        display: grid;
        grid-template-columns: 250px 1fr;
        height: 100vh;
        font-family: 'Nunito', sans-serif;
    }

    body.auth-layout {
        display: block; /* Layout tanpa grid untuk halaman login/register */
    }

    /* Sidebar untuk laptop/PC */
    .sidebar {
        background-color: #ffffff;
        color: #000;
        border-right: 1px solid #e0e0e0;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        z-index: 1000;
        height: 100vh;
    }

    .sidebar a {
        text-decoration: none;
        color: inherit;
        margin: 0.5rem 0;
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 14px;
        padding: 0.5rem;
        border-radius: 6px;
    }

    .sidebar a:hover {
        background-color: #f3f4f6;
    }

    .sidebar a i {
        margin-right: 12px;
    }

    .sidebar .section-title {
        margin: 1rem 0 0.5rem;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        color: #6c757d;
    }

    .mt-auto {
        margin-top: auto;
    }

    .main-content {
        padding: 1rem;
        overflow-y: auto;
        background-color: #f8f9fa;
    }

    /* Navbar untuk perangkat kecil */
    @media (max-width: 767px) {
        body {
            grid-template-columns: 1fr;
        }

        .sidebar {
            display: none;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar a {
            text-decoration: none;
            color: inherit;
            font-weight: bold;
        }

        .navbar-toggler {
            border: none;
            background-color: transparent;
        }

        .dropdown-menu {
            position: static;
            float: none;
            background-color: #ffffff;
            border: none;
            box-shadow: none;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            color: #000;
        }

        .navbar-collapse {
            display: none;
        }

        .navbar-collapse.show {
            display: block;
        }

        /* Penyesuaian untuk tampilan di perangkat kecil */
        .mobile-navbar {
            display: block !important;
        }

        .mobile-navbar .navbar {
            max-height: 60px;
            overflow: auto;
        }

        .mobile-navbar .offcanvas {
            height: auto !important;
            max-height: 80vh;
            overflow-y: auto;
        }

        main {
            margin-top: 70px; /* Tambahkan margin untuk menghindari tumpang tindih navbar */
        }
    }

    /* Penyesuaian untuk tablet atau layar di atas 768px */
    @media (min-width: 768px) {
        .mobile-navbar {
            display: none !important;
        }

        .sidebar {
            display: flex;
        }

        .navbar {
            display: none;
        }

        .main-content {
            padding: 2rem; /* Padding lebih besar untuk layar besar */
        }
    }

    /* Gaya tambahan untuk navigasi mobile */
    .offcanvas-body {
        padding: 1rem;
    }

    .offcanvas-body .nav-link {
        padding: 0.5rem;
        font-size: 14px;
    }

    .offcanvas-body .nav-link:hover {
        background-color: #e9ecef;
    }

    .accordion-button {
        font-size: 14px;
    }

    /* Gaya tombol di sidebar */
    .sidebar .nav-link.active {
        background-color: #f3f4f6;
        color: #000;
        font-weight: bold;
    }

    /* Scroll lokal untuk offcanvas menu */
    .offcanvas-body {
        max-height: 80vh; /* Batas tinggi maksimum */
        overflow-y: auto; /* Aktifkan scroll vertikal */
    }

    /* Penyesuaian untuk layout grid */
    main {
        overflow-y: auto;
    }

    footer {
        padding: 1rem;
        background-color: #fff;
        border-top: 1px solid #e0e0e0;
    }
    .accordion-button::after {
        display: none; 
    }
</style>

</head>
<body class="{{ Request::is('auth/login') || Request::is('auth/register') ? 'auth-layout' : '' }}">

@if (!Request::is('auth/login') && !Request::is('auth/register'))
    <!-- Navbar untuk perangkat kecil -->
<nav class="navbar navbar-light bg-white shadow-sm fixed-top mobile-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <i class="fas fa-users-cog me-2"></i>Team Management
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="offcanvas offcanvas-top mobile-navbar" tabindex="-1" id="mobileNavbar" aria-labelledby="mobileNavbarLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="mobileNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="accordion" id="mainMenuAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="homeHeader">
                    <a href="/home" class="nav-link p-2">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </h2>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="kelompokHeader">
                    <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#kelompokMenu" aria-expanded="false" aria-controls="kelompokMenu">
                        <i class="fas fa-users me-2"></i>Kelompok
                    </button>
                </h2>
                <div id="kelompokMenu" class="accordion-collapse collapse" aria-labelledby="kelompokHeader" data-bs-parent="#mainMenuAccordion">
                    <div class="accordion-body p-0">
                        <a href="{{ route('kelompok.create') }}" class="nav-link p-3">
                            <i class="fas fa-plus-circle me-2"></i>Buat Kelompok
                        </a>
                        <a href="{{ route('join.kelompok') }}" class="nav-link p-3">
                            <i class="fas fa-user-plus me-2"></i>Join Kelompok
                        </a>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="projectHeader">
                    <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#projectMenu" aria-expanded="false" aria-controls="projectMenu">
                        <i class="fas fa-project-diagram me-2"></i>Projects & Tasks
                    </button>
                </h2>
                <div id="projectMenu" class="accordion-collapse collapse" aria-labelledby="projectHeader" data-bs-parent="#mainMenuAccordion">
                    <div class="accordion-body p-0">
                        <a href="{{ route('project.create') }}" class="nav-link p-3">
                            <i class="fas fa-folder-plus me-2"></i>Buat Proyek
                        </a>
                        <a href="{{ route('tasks.create') }}" class="nav-link p-3">
                            <i class="fas fa-tasks me-2"></i>Buat Task
                        </a>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="nav-link p-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link p-3">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    @endif
                @else
                    <div class="accordion-header">
                        <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu">
                            <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name }}
                        </button>
                    </div>
                    <div id="userMenu" class="accordion-collapse collapse" aria-labelledby="userDropdown" data-bs-parent="#mainMenuAccordion">
                        <div class="accordion-body p-0">
                            <span class="nav-link p-3">Kelompok Id: {{ Auth::user()->kelompok_id }}</span>
                            <a class="nav-link p-3" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>

    <!-- Sidebar untuk perangkat besar -->
    <nav class="sidebar d-none d-md-flex">
    <a class="navbar-brand" href="/home"><i class="fas fa-users"></i> Team Management</a>
    <a href="/home"><i class="fas fa-home"></i> Home</a>
    <div class="section-title">Kelompok</div>
    <a href="{{ route('kelompok.create') }}"><i class="fas fa-plus-circle"></i> Buat Kelompok</a>
    <a href="{{ route('join.kelompok') }}"><i class="fas fa-user-plus"></i> Join Kelompok</a>
    <div class="section-title">Projects & Tasks</div>
    <a href="{{ route('project.create') }}"><i class="fas fa-folder-plus"></i> Buat Proyek</a>
    <a href="{{ route('tasks.create') }}"><i class="fas fa-tasks"></i> Buat Task</a>
    
    <!-- User Accordion Section -->
    <div class="section-title mt-4">User</div>
    <div class="accordion" id="userAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="userHeader">
                <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu">
                    <i class="fas fa-user-circle me-2"></i> {{ Auth::user()->name }}
                </button>
            </h2>
            <div id="userMenu" class="accordion-collapse collapse" aria-labelledby="userHeader" data-bs-parent="#userAccordion">
                <div class="accordion-body p-0">
                    <span class="nav-link p-3">Kelompok Id: {{ Auth::user()->kelompok_id }}</span>
                    <a class="nav-link p-3" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
@endif

<!-- Main Content -->
<main class="main-content">
    @yield('content')
</main>

<!-- JavaScript -->
<script>
    document.getElementById('navbarToggle').addEventListener('click', function () {
        document.getElementById('navbarMenu').classList.toggle('show');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
</body>
</html>

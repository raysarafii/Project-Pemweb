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

    .sidebar {
        background-color: #ffffff;
        color: #000;
        border-right: 1px solid #e0e0e0;
        display: flex;
        flex-direction: column;
        padding: 1rem;
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

    .sidebar .dropdown-menu {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    .sidebar .dropdown-menu a {
        color: #000;
    }

    .sidebar .navbar-brand {
        font-size: 16px;
        font-weight: bold;
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .sidebar .navbar-brand i {
        margin-right: 12px;
    }

    .section-title {
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
   </style>
</head>

<body class="{{ Request::is('auth/login') || Request::is('auth/register') ? 'auth-layout' : '' }}">

@if (!Request::is('auth/login') && !Request::is('auth/register'))
<nav class="sidebar">
    <a class="navbar-brand" href="/home">
        <i class="fas fa-users"></i> Team Management
    </a>

    <a href="/home">
        <i class="fas fa-home"></i> Home
    </a>

    <div class="section-title">Kelompok</div>
    <a href="{{ route('kelompok.create') }}">
        <i class="fas fa-plus-circle"></i> Buat Kelompok
    </a>
    <a href="{{ route('join.kelompok') }}">
        <i class="fas fa-user-plus"></i> Join Kelompok
    </a>

    <div class="section-title">Projects & Tasks</div>
    <a href="{{ route('project.create') }}">
        <i class="fas fa-folder-plus"></i> Buat Proyek
    </a>
    <a href="{{ route('tasks.create') }}">
        <i class="fas fa-tasks"></i> Buat Task
    </a>

    <div class="mt-auto">
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i> Register
                </a>
            @endif
        @else
            <a href="#" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        @endguest
    </div>
</nav>
@endif

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Bootstrap JS CDN -->
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

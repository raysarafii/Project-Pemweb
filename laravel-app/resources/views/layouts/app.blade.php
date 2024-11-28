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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
</head>
<body>
    <div id="app">
       @if(!Request::is('auth/login') && !Request::is('auth/register') && !Request::is('password/reset') && !Request::is('password/reset/*')) <!-- Corrected condition -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/home">
            <i class="fas fa-users"></i> Team Management
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- Dropdown Kelompok -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="kelompokMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-layer-group"></i> Kelompok
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kelompokMenu">
                        <li><a class="dropdown-item" href="{{ route('kelompok.create') }}"><i class="fas fa-plus-circle"></i> Buat Kelompok</a></li>
                        <li><a class="dropdown-item" href="{{ route('join.kelompok') }}"><i class="fas fa-user-plus"></i> Join Kelompok</a></li>
                    </ul>
                </li>

                <!-- Dropdown Projects & Tasks -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="projectTaskMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-project-diagram"></i> Projects & Tasks
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="projectTaskMenu">
                        <li><a class="dropdown-item" href="{{ route('project.create') }}"><i class="fas fa-folder-plus"></i> Buat Proyek</a></li>
                        <li><a class="dropdown-item" href="{{ route('tasks.create') }}"><i class="fas fa-tasks"></i> Buat Task</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-semibold" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-semibold" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

        @endif

        <main class="@if(Request::is('auth/login') || Request::is('auth/register')) p-0 @else py-4 @endif">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        // Check if session has 'success' message
        @if(session('success'))
            toastr.success("{{ session('success') }}", "Success", {
                positionClass: "toast-top-right", // Position at top-right
                closeButton: true,
                progressBar: true,
            });
        @endif

    </script>
    <script>
    // Pastikan jQuery sudah dimuat
    $(document).ready(function() {
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    });
     toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };
</script>
<style>
    /* Navbar link styles */
    .nav-link {
        position: relative;
        padding-bottom: 0.25rem; /* space for underline effect */
    }

    /* Hover effect - add a blue underline */
    .nav-link:hover {
        color: #007bff !important; /* Change text color on hover */
    }

    .nav-link:hover::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #007bff; /* Blue underline */
        bottom: 0;
        left: 0;
        transition: width 0.3s ease;
    }

    /* Active link effect - blue underline */
    .nav-link.active::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #007bff; /* Blue underline */
        bottom: 0;
        left: 0;
    }
</style>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Managament - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ensure full height of the page */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Background color for the entire login container */
        .login-container {
            background-color: #2967AE;
            height: 100%; /* Ensure the background covers the full screen */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card styling */
        .card {
            border-radius: 10px;
            overflow: hidden;
            background-color: transparent;
        }

        /* Form control styling */
        .form-control {
            padding: 0.8rem 1rem;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        /* Focus state of the form control */
        .form-control:focus {
            border-color: #2967AE;
            box-shadow: 0 0 0 0.25rem rgba(41, 103, 174, 0.25);
        }

        /* Button styling */
        .btn-primary {
            padding: 0.8rem;
            border-radius: 8px;
            background-color: #2967AE;
            border: none;
        }

        /* Hover state of the button */
        .btn-primary:hover {
            background-color: #255a9d;
        }

        /* Styling for links with primary color */
        .text-primary {
            color: #2967AE;
            text-decoration: none;
        }

        .text-primary:hover {
            text-decoration: underline;
        }

        /* Right side of the card (white background) */
        .bg-white {
            background-color: white;
            border-radius: 0 10px 10px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center min-vh-100 align-items-center">
                <div class="col-md-10">
                    <div class="card border-0 shadow">
                        <div class="row g-0">
                            <!-- Left side - Helmet Image -->
                            <div class="col-md-6">
                                <img src="{{ asset('images/manajemen-removebg-preview.png') }}" class="img-fluid" alt="Helmet">
                            </div>
                            
                            <!-- Right side - Login Form -->
                            <div class="col-md-6 bg-white">
                                <div class="card-body p-4">
                                    <h2 class="text-center mb-4">Form Login</h2>
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        
                                        <!-- Email field -->
                                        <div class="mb-3">
                                            <input id="email" type="email" 
                                                class="form-control" 
                                                name="email" 
                                                placeholder="Email Address"
                                                required 
                                                autocomplete="email" 
                                                autofocus>
                                        </div>

                                        <!-- Password field -->
                                        <div class="mb-3">
                                            <input id="password" type="password" 
                                                class="form-control" 
                                                name="password" 
                                                placeholder="Password"
                                                required 
                                                autocomplete="current-password">
                                        </div>

                                        <!-- Forgot Password -->
                                        <div class="mb-3 text-end">
                                            <a class="text-primary small" href="{{ route('password.update') }}">
                                                Lupa password?
                                            </a>
                                        </div>
                                        
                                        <!-- Login Button -->
                                        <div class="d-grid gap-2 mb-3">
                                            <button type="submit" class="btn btn-primary">
                                                LOGIN
                                            </button>
                                        </div>

                                        <!-- Register Link -->
                                        <div class="text-center">
                                            <span>Belum punya akun? </span>
                                            <a href="{{ route('register') }}" class="text-primary text-decoration-none">
                                                Daftar
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

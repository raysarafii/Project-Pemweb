<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Managament - Register</title>
    <!-- Optional Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="register-container">
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-10">
                <div class="card border-0 shadow">
                    <div class="row g-0">
                        <!-- Left side - Shield Image -->
                        <div class="col-md-6">
                            <img src="{{ asset('images/manajemen-removebg-preview.png') }}" class="img-fluid" alt="Security Shield">
                        </div>
                        
                        <!-- Right side - Registration Form -->
                        <div class="col-md-6 bg-white">
                            <div class="card-body p-4">
                                <h2 class="text-center mb-4">Form Registrasi</h2>
                                
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    
                                    <!-- Name field -->
                                    <div class="mb-3">
                                        <input id="name" type="text" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="name" 
                                            value="{{ old('name') }}" 
                                            placeholder="Nama Lengkap"
                                            required 
                                            autocomplete="name" 
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Email field -->
                                    <div class="mb-3">
                                        <input id="email" type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            placeholder="Email Address"
                                            required 
                                            autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password field -->
                                    <div class="mb-3">
                                        <input id="password" type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password" 
                                            placeholder="Password"
                                            required 
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password field -->
                                    <div class="mb-4">
                                        <input id="password-confirm" type="password" 
                                            class="form-control"
                                            name="password_confirmation" 
                                            placeholder="Konfirmasi Password"
                                            required 
                                            autocomplete="new-password">
                                    </div>

                                    <!-- Register Button -->
                                    <div class="d-grid gap-2 mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            DAFTAR
                                        </button>
                                    </div>

                                    <!-- Login Link -->
                                    <div class="text-center">
                                        <span>Sudah punya akun? </span>
                                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                                            Login
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

<style>
.register-container {
    background-color: #2967AE;
    min-height: 100vh;
}

.card {
    border-radius: 10px;
    overflow: hidden;
    background-color: transparent;
}

.form-control {
    padding: 0.8rem 1rem;
    border-radius: 8px;
    background-color: #f8f9fa;
}

.form-control:focus {
    border-color: #2967AE;
    box-shadow: 0 0 0 0.25rem rgba(41, 103, 174, 0.25);
}

.btn-primary {
    padding: 0.8rem;
    border-radius: 8px;
    background-color: #2967AE;
    border: none;
}

.btn-primary:hover {
    background-color: #255a9d;
}

.text-primary {
    color: #2967AE;
    text-decoration: none;
}

.text-primary:hover {
    text-decoration: underline;
}

.bg-white {
    background-color: white;
    border-radius: 0 10px 10px 0;
}
</style>

</body>
</html>

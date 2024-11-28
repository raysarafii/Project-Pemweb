{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
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
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            placeholder="Email Address"
                                            required 
                                            autocomplete="email" 
                                            autofocus>
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
                                            autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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

<style>
.login-container {
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
@endsection

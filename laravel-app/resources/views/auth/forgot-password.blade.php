<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Forgot Your Password?') }}</div>

                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
@vite(['resources/css/app.css', 'resources/js/app.js'])
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                           <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary btn-custom">
        {{ __('Reset Password') }}
    </button>
</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<style>
    .btn-custom {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3; /* Contoh perubahan warna saat hover */
        transform: scale(1.05); /* Menaikkan ukuran tombol sedikit */
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
                <div class="card-header text-white text-center" 
                     style="background-color: #2967AE; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                    <h5 class="mb-0">Gabung Kelompok</h5>
                </div>
                <div class="card-body">
                    <!-- Tampilkan pesan sukses -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tampilkan pesan error jika sudah bergabung -->
                    @if (session('error'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('join.kelompok') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kelompok_id" class="form-label">Masukkan ID Kelompok:</label>
                            <input type="text" name="kelompok_id" id="kelompok_id" class="form-control" required>
                        </div>
                        <button type="submit" class="btn text-white w-100" style="background-color: #2967AE; border-radius: 0.5rem;">Gabung</button>
                    </form>

                    <!-- Tombol Keluar Kelompok -->
                    @if (Auth::user()->kelompok_id)
                        <form action="{{ route('keluar.kelompok') }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">Keluar Kelompok</button>
                        </form>
                    @endif

                    <!-- Tampilkan pesan error jika ada -->
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

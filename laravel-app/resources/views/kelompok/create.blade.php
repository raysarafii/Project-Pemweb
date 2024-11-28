@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-5">
        <div class="card shadow border-0 rounded">
            <div class="card-header text-white text-center" style="background-color: #2967AE; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                <h2 class="mb-0">Buat Kelompok Baru</h2>
            </div>
            <div class="card-body text-center">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kelompok.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="name" class="form-label">Nama Kelompok</label>
                        <input type="text" id="name" name="name" class="form-control" style="border-radius: 0.25rem;" required>
                    </div>
                    <button type="submit" class="btn text-white w-100" style="background-color: #2967AE; border-radius: 0.5rem;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

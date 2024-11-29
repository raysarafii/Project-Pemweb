@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-0 rounded">
            <div class="card-body">
                <h2 class="mb-3 text-center">Buat Proyek Baru</h2>
                <p class="text-muted">Isi detail proyek baru Anda di bawah ini</p>

                <!-- Form Start -->
                <form action="{{ route('project.store') }}" method="POST">
                    @csrf

                    <!-- Informasi Umum Section -->
                    <h5 class="mb-3">Informasi Umum</h5>
                    
                    <!-- Nama Proyek -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Proyek</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ketikkan nama proyek" required>
                    </div>

                    <!-- Deskripsi Proyek -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Proyek</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Detail proyek yang dibuat"></textarea>
                    </div>

                    <!-- Deadline -->
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" required>
                    </div>

                    <!-- Tim Proyek Section -->
                    <h5 class="mt-4 mb-3">Tim Proyek</h5>

                   <div class="mb-3">
                                        <label for="kelompok_id" class="form-label">Team</label>
                                        <select class="form-select @error('kelompok_id') is-invalid @enderror" 
                                                id="kelompok_id" 
                                                name="kelompok_id" 
                                                required>
                                            <option value="{{ $kelompok->kelompok_id }}" selected>
                                                {{ $kelompok->name }}
                                            </option>
                                        </select>
                                        @error('kelompok_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #2967AE;">Buat Proyek</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

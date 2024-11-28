@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0 rounded">
            <div class="card-body">
                <h2 class="mb-4 text-center">Buat Tugas Baru</h2>
                
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <!-- Task Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Tugas</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Team Dropdown -->
                    <div class="mb-3">
                        <label for="kelompok_id" class="form-label">Tim</label>
                        <select class="form-select" id="kelompok_id" name="kelompok_id" required>
                            <option value="{{ $kelompok->kelompok_id }}" {{ old('kelompok_id') == $kelompok->kelompok_id ? 'selected' : '' }}>
                                {{ $kelompok->name }}
                            </option>
                        </select>
                    </div>

                    <!-- Project Dropdown -->
                    <div class="mb-3">
                        <label for="project_id" class="form-label">Proyek</label>
                        <select class="form-select" id="project_id" name="project_id" required>
                            <option value="" disabled selected>Pilih proyek</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->project_id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Assigned To Dropdown -->
                    <div class="mb-3">
                        <label for="assigned_to" class="form-label">Ditugaskan ke</label>
                        @if (isset($noKelompok))
                            <p class="form-text text-danger">{{ $noKelompok }}</p>
                        @else
                            <select class="form-select" id="assigned_to" name="assigned_to" required>
                                <option value="" disabled selected>Pilih user</option>
                                @foreach ($usersInKelompok as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <!-- Task Priority -->
                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="Tinggi">Tinggi</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Rendah">Rendah</option>
                        </select>
                    </div>

                    <!-- Task Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Belum Selesai">Belum Selesai</option>
                            <option value="Dalam Proses">Dalam Proses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #2967AE;">Buat Tugas</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

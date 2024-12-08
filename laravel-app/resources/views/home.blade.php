@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Tombol */
        .btn-gradient-primary {
            background-color: #2967AE; /* Warna biru utama */
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.3rem;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-gradient-primary:hover {
            background-color: #1f5187; /* Biru lebih gelap untuk hover */
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(47, 103, 174, 0.4);
        }

        .btn-gradient-warning {
            background-color: #ffffff; /* Putih */
            color: #2967AE; /* Biru utama */
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.3rem;
            border: 2px solid #2967AE;
            transition: all 0.3s ease;
        }

        .btn-gradient-warning:hover {
            background-color: #2967AE;
            color: white;
        }

        /* Header Kartu */
        .bg-gradient-primary {
            background-color: #2967AE; /* Warna biru utama */
            color: white;
            font-weight: 700;
            padding: 0.75rem;
            border-radius: 0.3rem 0.3rem 0 0;
            text-align: center;
        }

        /* Font dan Elemen */
        body {
            font-family: 'Poppins', sans-serif;
        }

        h5, h1 {
            font-weight: 600;
        }

        /* Bayangan Kartu */
        .card {
            border: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            border: none;
            background-color: #ffffff; /* Putih */
            margin-bottom: 0.5rem;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
            transition: background-color 0.2s ease;
        }

        /* Badge Prioritas */
        .badge-priority-high {
            background-color: #2967AE; /* Warna biru utama */
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 0.25rem;
            padding: 0.2rem 0.5rem;
        }

        .badge-priority-low {
            background-color: #6c757d; /* Abu-abu */
            color: white;
        }
    </style>

    <div class="row">
        <!-- Summary Cards -->
        <div class="col-12 mb-5">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-chart-bar fa-3x text-primary"></i>
                            </div>
                            <h5 class="text-muted">Total Proyek</h5>
                            <h1 class="fw-bold">{{ $totalProjects }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-pen-to-square fa-3x text-primary"></i>
                            </div>
                            <h5 class="text-muted">Tugas Anda</h5>
                            <h1 class="fw-bold">{{ $assignedTasks }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-users fa-3x text-primary"></i>
                            </div>
                            <h5 class="text-muted">Jumlah Anggota</h5>
                            <h1 class="fw-bold">{{ $jumlahAnggota }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proyek yang Tersedia -->
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="bg-gradient-primary">
                    <h5>Proyek yang Tersedia</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if($projects->isEmpty())
                            <li class="list-group-item text-center">Tidak ada proyek untuk kelompok ini.</li>
                        @else
                            @foreach($projects as $project)
                                @php
                                    $isDeadlineOver = \Carbon\Carbon::parse($project->deadline)->isPast();
                                @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: {{ $isDeadlineOver ? '#ffcccc' : '' }};">
                                    <div>
                                        <strong>{{ $project->name }}</strong><br>
                                        {{ $project->description }}
                                        <br><small class="text-muted">
                                            Deadline: <span class="badge badge-priority-high"> {{ \Carbon\Carbon::parse($project->deadline)->translatedFormat('d/m/Y') }}</span></small>
                                            <br>
                                    </div>
                                    <div>
                                        <a href="{{ route('projects.show', $project->project_id) }}" class="btn btn-gradient-primary btn-sm">Detail</a>
                                        <a href="{{ route('projects.edit', $project->project_id) }}" class="btn btn-gradient-warning btn-sm">Edit</a>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tugas Anda -->
        <div class="col-md-12">
            <div class="card">
                <div class="bg-gradient-primary">
                    <h5>Tugas Anda</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if($tasks->isEmpty())
                            <li class="list-group-item text-center">Anda belum memiliki tugas yang ditugaskan.</li>
                        @else
                            @foreach($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $task->name }}</strong><br>
                                        Prioritas: <span class="badge badge-priority-high">{{ ucfirst($task->priority) }}</span><br>
                                        Status: <span class="badge badge-priority-low">{{ ucfirst($task->status) }}</span>
                                    </div>
                                    <div>
                                        <a href="{{ route('projects.show', $task->project->project_id) }}" class="btn btn-gradient-primary btn-sm">Proyek</a>
                                        <a href="{{ route('tasks.edit', $task->task_id) }}" class="btn btn-gradient-warning btn-sm">Edit</a>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

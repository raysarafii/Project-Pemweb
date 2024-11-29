@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Summary Cards -->
        <div class="col-12 mb-4">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <i class="fas fa-chart-bar fa-2x text-primary"></i>
                            </div>
                            <h5>Total Proyek</h5>
                            <h1>{{ $totalProjects }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <i class="fas fa-pen-to-square fa-2x text-primary"></i>
                            </div>
                            <h5>Tugas Anda</h5>
                            <h1>{{ $assignedTasks }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <h5>Jumlah Anggota</h5>
                            <h1>{{ $jumlahAnggota }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proyek yang Tersedia -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white text-center" style="border-radius: 0.3rem;">
                    Proyek yang Tersedia
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if($projects->isEmpty())
                            <li class="list-group-item">Tidak ada proyek untuk kelompok ini.</li>
                        @else
                            @foreach($projects as $project)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $project->name }}</strong><br>
                                        {{ $project->description }}
                                        <small>(Deadline: {{ \Carbon\Carbon::parse($project->deadline)->translatedFormat('d/m/Y') }})</small>
                                    </div>
                                    <div>
                                        <a href="{{ route('projects.show', $project->project_id) }}" class="btn btn-primary btn-sm">Detail</a>
                                        <a href="{{ route('projects.edit', $project->project_id) }}" class="btn btn-warning btn-sm">Edit</a>
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
            <br>
            <div class="card">
                <div class="card-header bg-primary text-white text-center" style="border-radius: 0.3rem;">
                    Tugas Anda
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if($tasks->isEmpty())
                            <li class="list-group-item">Anda belum memiliki tugas yang ditugaskan.</li>
                        @else
                            @foreach($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $task->name }}</strong><br>
                                        Prioritas: {{ ucfirst($task->priority) }}<br>
                                        Status: {{ ucfirst($task->status) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('projects.show', $task->project->project_id) }}" class="btn btn-primary btn-sm">Proyek</a>
                                        <a href="{{ route('tasks.edit', $task->task_id) }}" class="btn btn-warning btn-sm">Edit</a>
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

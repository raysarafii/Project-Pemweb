@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header text-white bg-primary">
                    <h5 class="mb-0 text-center">{{ $project->name }}</h5>
                </div>

                <div class="card-body">
                    <h5 class="font-weight-bold">Deskripsi:</h5>
                    <p class="ml-3">{{ $project->description }}</p>

                    <h5 class="font-weight-bold mt-4">Tugas untuk Proyek ini:</h5>
                    <ul class="ml-4">
                        @php
                            $tasks = \App\Models\Task::where('project_id', $project->project_id)
                                                       ->where('assigned_to', auth()->user()->id)
                                                       ->get();
                        @endphp

                        @forelse($tasks as $task)
                            <li>
                                <strong>{{ $task->name }}</strong>
                                (Prioritas: {{ $task->priority }}, Status: {{ $task->status }})
                                - Proyek: {{ $task->project->name }}
                            </li>
                        @empty
                            <li class="text-muted">Tidak ada tugas yang ditugaskan untuk kelompok ini.</li>
                        @endforelse
                    </ul>

                    <h5 class="font-weight-bold mt-4">Deadline:</h5>
                    <p class="ml-3">{{ \Carbon\Carbon::parse($project->deadline)->translatedFormat('l, d/m/Y') }}</p>

                    <h5 class="font-weight-bold mt-4">Komentar:</h5>
                    <ul class="ml-4 list-unstyled">
                        @forelse($project->comments as $comment)
                            <li class="mb-2">
                                <strong>{{ $comment->user->name }}</strong> <br>
                                <small class="text-muted">Tanggal: {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y H:i') }}</small><br>
                                <p class="ml-3 mb-1">{{ $comment->comment }}</p>
                            </li>
                        @empty
                            <li class="text-muted">Tidak ada komentar untuk proyek ini.</li>
                        @endforelse
                    </ul>

                    <h5 class="font-weight-bold mt-4">Tambahkan Komentar:</h5>
                    <form action="{{ route('comments.store', $project->project_id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment" class="sr-only">Komentar:</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Tulis komentar Anda di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

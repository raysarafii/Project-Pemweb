@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header text-white text-center rounded-top" style="background-color: #2967AE;">
                    <h4 class="mb-0">{{ $project->name }}</h4>
                </div>

                <div class="card-body">
                    <section>
                        <h5 class="fw-bold">Deskripsi</h5>
                        <p class="text-secondary">{{ $project->description }}</p>
                    </section>

                    <hr>

                    <section>
                        <h5 class="fw-bold">Tugas untuk Proyek ini</h5>
                        <ul class="list-group list-group-flush">
                            @php
                                $tasks = \App\Models\Task::where('project_id', $project->project_id)
                                    ->where('assigned_to', auth()->user()->id)
                                    ->get();
                            @endphp

                            @forelse($tasks as $task)
                                <li class="list-group-item d-flex align-items-start">
                                    <div class="ms-2">
                                        <strong>{{ $task->name }}</strong> <br>
                                        <small class="text-muted">
                                            Prioritas: {{ $task->priority }}, 
                                            Status: {{ $task->status }}
                                        </small>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item text-muted">Tidak ada tugas yang ditugaskan untuk kelompok ini.</li>
                            @endforelse
                        </ul>
                    </section>

                    <hr>

                    <section>
                        <h5 class="fw-bold">Deadline</h5>
                        <p class="text-secondary">{{ \Carbon\Carbon::parse($project->deadline)->translatedFormat('l, d/m/Y') }}</p>
                    </section>

                    <hr>

                    <section>
                        <h5 class="fw-bold">Komentar</h5>
                        <ul class="list-unstyled">
                            @forelse($project->comments as $comment)
                                <li class="border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user-circle text-primary me-2 fa-lg"></i>
                                        <strong>{{ $comment->user->name }}</strong>
                                    </div>
                                    <small class="text-muted d-block">
                                        {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y H:i') }}
                                    </small>
                                    <p class="text-secondary mt-2">{{ $comment->comment }}</p>
                                </li>
                            @empty
                                <li class="text-muted">Tidak ada komentar untuk proyek ini.</li>
                            @endforelse
                        </ul>
                    </section>

                    <section class="mt-4">
                        <h5 class="fw-bold">Tambahkan Komentar</h5>
                        <form action="{{ route('comments.store', $project->project_id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea 
                                    name="comment" 
                                    id="comment" 
                                    class="form-control" 
                                    rows="3" 
                                    placeholder="Tulis komentar Anda di sini..." 
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #2967AE;">Kirim Komentar</button>
                        </form>
                    </section>

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

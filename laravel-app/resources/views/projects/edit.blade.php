@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Project: {{ $project->name }}</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success mt-2">{{ session('success') }}</div>
                    @endif

                    <!-- Form untuk mengedit proyek -->
                    <form action="{{ route('projects.update', $project->project_id) }}" method="POST">
                        @csrf
                        @method('PUT')  <!-- Important for sending PUT request -->

                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline', $project->deadline->format('Y-m-d')) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kelompok_id" class="form-label">Team</label>
                            <!-- Only show the currently assigned team -->
                            <select class="form-select" id="kelompok_id" name="kelompok_id" required>
                                <option value="{{ $project->kelompok_id }}" selected>{{ $project->kelompok->name }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

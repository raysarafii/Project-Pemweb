@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center rounded-top" style="background-color: #2967AE;">
                    <h4 class="mb-0">{{ $project->name }}</h4>
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
                            <label for="name" class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Proyek</label>
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

                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary" style="background-color: #2967AE;">Update Proyek</button>
                            <!-- Delete Button that triggers the modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </div>
                    </form>

                    <!-- Modal for delete confirmation -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus project ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="delete-form-{{ $project->project_id }}" action="{{ route('projects.destroy', ['id' => $project->project_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

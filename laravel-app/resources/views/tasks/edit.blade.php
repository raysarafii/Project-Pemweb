@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center rounded-top" style="background-color: #2967AE;">
                     <h4 class="mb-0">{{ $task->name }}</h4>
                </div>
                <div class="card-body">
                    <!-- Update Form -->
                    <form method="POST" action="{{ route('tasks.update', $task->task_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama Tugas</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $task->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="priority">Prioritas</label>
                            <select id="priority" name="priority" class="form-control" required>
                                <option value="Tinggi" {{ $task->priority == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                <option value="Sedang" {{ $task->priority == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Rendah" {{ $task->priority == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="Belum Selesai" {{ $task->status == 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                <option value="Dalam Proses" {{ $task->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="Selesai" {{ $task->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                        <br>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary" style="background-color: #2967AE;">Update Tugas</button>
                            <!-- Delete Button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </div>
                    </form>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus task ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <!-- Form Delete -->
                                    <form action="{{ route('tasks.destroy', $task->task_id) }}" method="POST" style="display: inline;">
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

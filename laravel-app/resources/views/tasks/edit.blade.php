@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Tugas') }}</div>

                <div class="card-body">
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
                            <br>
                        </div>


                      

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

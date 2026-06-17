@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Edit Master Ruangan</h3>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary btn-sm">
                    ← Kembali ke Tabel
                </a>
            </div>

            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-dark fw-bold">
                    Formulir Edit Data Ruangan
                </div>
                <div class="card-body">
                    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Ruangan</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $room->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label fw-bold">Kapasitas (Orang)</label>
                            <input type="number" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $room->capacity) }}" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="facilities" class="form-label fw-bold">Fasilitas Ruangan</label>
                            <textarea name="facilities" id="facilities" class="form-control @error('facilities') is-invalid @enderror" rows="3" required>{{ old('facilities', $room->facilities) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status Ruangan</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-warning px-4 fw-bold">Update Ruangan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Tambah Master Ruangan Baru</h3>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary btn-sm">
                    ← Kembali ke Tabel
                </a>
            </div>

            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white fw-bold">
                    Formulir Input Data Ruangan
                </div>
                <div class="card-body">
                    <form action="{{ route('rooms.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Ruangan</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Ruang Meeting Alpha" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label fw-bold">Kapasitas (Orang)</label>
                            <input type="number" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" placeholder="Contoh: 15" value="{{ old('capacity') }}" min="1" required>
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="facilities" class="form-label fw-bold">Fasilitas Ruangan</label>
                            <textarea name="facilities" id="facilities" class="form-control @error('facilities') is-invalid @enderror" rows="3" placeholder="Contoh: AC Hisense, Proyektor, Papan Tulis, Sound System" required>{{ old('facilities') }}</textarea>
                            @error('facilities')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="status" value="available">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="reset" class="btn btn-light me-md-2">Reset Form</button>
                            <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Ruangan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
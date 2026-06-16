<html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Peminjaman Ruangan</h5>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="fw-bold">Pilih Ruangan</label>
                            <select name="room_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Ruangan --</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }} (Kapasitas: {{ $room->capacity }} Orang)</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Waktu Mulai</label>
                                <input type="datetime-local" name="start_time" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Waktu Selesai</label>
                                <input type="datetime-local" name="end_time" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold">Keperluan</label>
                            <input type="text" name="purpose" class="form-control" placeholder="Contoh: Rapat Evaluasi Bulanan" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Ajukan Peminjaman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
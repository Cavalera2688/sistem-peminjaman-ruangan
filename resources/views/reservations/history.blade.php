<html>
<head>
    <title>Riwayat Peminjaman</title>
</head>
<body>
    
@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Riwayat Peminjaman Saya</h3>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Ruangan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Keperluan</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reservations as $res)
                    <tr>
                        <td class="fw-bold">{{ $res->room->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($res->start_time)->format('d M Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($res->end_time)->format('d M Y H:i') }}</td>
                        <td>{{ $res->purpose }}</td>
                        <td class="text-center">
                            @if($res->status == 'approved')
                                <span class="badge bg-success">Disetujui</span>
                            @elseif($res->status == 'rejected')
                                <span class="badge bg-danger">Ditolak</span>
                            @elseif($res->status == 'completed')
                                <span class="badge bg-info">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada riwayat peminjaman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

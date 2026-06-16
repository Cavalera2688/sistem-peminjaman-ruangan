@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4 fw-bold">Dashboard Admin: Approval Peminjaman</h3>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-primary">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Ruangan</th>
                            <th>Tgl Pinjam</th>
                            <th>Waktu</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $index => $reservation)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $reservation->user->name ?? 'User Tidak Diketahui' }}</td>
                            <td>{{ $reservation->room->name ?? 'Ruangan Dihapus' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}</td>
                            <td class="text-center">{{ $reservation->start_time }} - {{ $reservation->end_time }}</td>
                            <td>{{ $reservation->purpose }}</td>
                            <td class="text-center">
                                @if($reservation->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($reservation->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($reservation->status == 'pending')
                                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-success btn-sm fw-bold" onclick="return confirm('Yakin APPROVE pinjaman ini?')">Approve</button>
                                    </form>

                                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Yakin REJECT pinjaman ini?')">Reject</button>
                                    </form>
                                @else
                                    <span class="text-muted fw-bold">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">Belum ada antrean peminjaman ruangan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
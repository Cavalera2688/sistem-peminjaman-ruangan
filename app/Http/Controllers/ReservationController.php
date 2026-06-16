<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Menampilkan form booking
    public function create()
    {
        // Hanya tampilkan ruangan yang statusnya available
        $rooms = Room::where('status', 'available')->get();
        return view('reservations.create', compact('rooms'));
    }

    // Memproses form booking
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date|after_or_equal:today',
            'end_time' => 'required|date|after:start_time',
            'purpose' => 'required|string|max:255',
        ]);

        // LOGIC ANTI BENTROK: Cek apakah jadwal udah di-booking (termasuk yang masih pending)
        $isBooked = Reservation::where('room_id', $request->room_id)
            ->whereIn('status', ['approved', 'pending'])
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('start_time', '<=', $request->start_time)
                      ->where('end_time', '>', $request->start_time);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('start_time', '<', $request->end_time)
                      ->where('end_time', '>=', $request->end_time);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('start_time', '>=', $request->start_time)
                      ->where('end_time', '<=', $request->end_time);
                });
            })
            ->exists();

        if ($isBooked) {
            return back()->with('error', 'Maaf, ruangan sudah dipesan pada waktu tersebut. Silakan pilih waktu atau ruangan lain.');
        }

        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'purpose' => $request->purpose,
            'status' => 'pending' // Default selalu masuk antrean
        ]);

        return redirect()->route('reservations.history')->with('success', 'Pengajuan peminjaman berhasil dikirim! Menunggu konfirmasi admin.');
    }

    // Menampilkan riwayat peminjaman user
    public function history()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->with('room')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('reservations.history', compact('reservations'));
    }
}
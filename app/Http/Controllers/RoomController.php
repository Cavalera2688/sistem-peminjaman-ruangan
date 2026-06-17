<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        // Cek kalau user lagi nyari ruangan
        if ($request->has('search')) {
            // Tarik data pakai 'paginate' (jangan pakai get atau all)
            $rooms = Room::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            // Tarik data normal pakai 'paginate'
            $rooms = Room::paginate(10);
        }

        // Biar pas pindah halaman (page 2, 3), teks pencariannya nggak hilang
        $rooms->appends(request()->all());

        // Lempar datanya ke tampilan HTML
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('rooms.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'facilities' => 'required|string',
            'status' => 'required|in:available,maintenance',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    // Fungsi buat ngebuka halaman edit.blade.php
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    // Fungsi buat nyimpen perubahannya ke database
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'facilities' => 'required',
            'status' => 'required'
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Data ruangan berhasil diupdate!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil dihapus!');
    }
}
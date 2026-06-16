<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bikin Data User (1 Admin, 2 User Biasa)
        User::create([
            'name' => 'Fikri (PM/Admin)',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin', // Pastiin di tabel users lu udah ada kolom role ya, kalau belum, hapus baris ini
        ]);

        User::create([
            'name' => 'Ananda (Dev)',
            'email' => 'ananda@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Krispiyanto (Dev)',
            'email' => 'kris@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Bikin Data Dummy Ruangan
        Room::create([
            'name' => 'Ruang Rapat Alpha',
            'capacity' => 20,
            'facilities' => 'AC, Proyektor, Papan Tulis, WiFi',
            'status' => 'available',
        ]);

        Room::create([
            'name' => 'Auditorium Utama',
            'capacity' => 100,
            'facilities' => 'AC Sentral, Sound System, Proyektor 4K, Podium',
            'status' => 'available',
        ]);

        Room::create([
            'name' => 'Ruang Diskusi Beta',
            'capacity' => 5,
            'facilities' => 'AC, TV Monitor, Papan Tulis',
            'status' => 'maintenance',
        ]);
    }
}
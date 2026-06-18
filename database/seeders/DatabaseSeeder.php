<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
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
=======
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Bikin Akun Dummy Biar Gampang Login
        User::create([
            'name' => 'Fikri (PM/Admin)',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Krispiyanto',
            'email' => 'kris@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Ananda',
            'email' => 'ananda@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // 2. Bikin Data Master Ruangan (Sama kayak punya Kris)
        Room::create([
            'name' => 'Ruang Rapat Alpha',
            'capacity' => 20,
            'facilities' => 'AC, Proyektor, Whiteboard, WiFi',
>>>>>>> origin/dev-ananda
            'status' => 'available',
        ]);

        Room::create([
<<<<<<< HEAD
            'name' => 'Auditorium Utama',
            'capacity' => 100,
            'facilities' => 'AC Sentral, Sound System, Proyektor 4K, Podium',
=======
            'name' => 'Aula Utama',
            'capacity' => 100,
            'facilities' => 'AC Sentral, Sound System, Panggung, Layar LED',
>>>>>>> origin/dev-ananda
            'status' => 'available',
        ]);

        Room::create([
            'name' => 'Ruang Diskusi Beta',
<<<<<<< HEAD
            'capacity' => 5,
            'facilities' => 'AC, TV Monitor, Papan Tulis',
            'status' => 'maintenance',
        ]);
    }
}   
=======
            'capacity' => 10,
            'facilities' => 'AC, TV, Meja Bundar',
            'status' => 'maintenance',
        ]);
    }
}
>>>>>>> origin/dev-ananda

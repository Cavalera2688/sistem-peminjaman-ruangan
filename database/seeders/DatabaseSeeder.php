<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'status' => 'available',
        ]);

        Room::create([
            'name' => 'Aula Utama',
            'capacity' => 100,
            'facilities' => 'AC Sentral, Sound System, Panggung, Layar LED',
            'status' => 'available',
        ]);

        Room::create([
            'name' => 'Ruang Diskusi Beta',
            'capacity' => 10,
            'facilities' => 'AC, TV, Meja Bundar',
            'status' => 'maintenance',
        ]);
    }
}
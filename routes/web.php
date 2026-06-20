<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

// Redirect langsung ke halaman login (Punya Fikri - lebih rapi)
use App\Http\Controllers\RoomController;
Route::redirect('/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute Peminjaman Ruangan (Punya Krispiyanto)
Route::middleware('auth')->group(function () {
    Route::get('/booking', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/booking', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/history', [ReservationController::class, 'history'])->name('reservations.history');

    // Halaman daftar antrean booking
    Route::get('/admin/reservations', [ReservationController::class, 'indexAdmin'])->name('admin.reservations.index');
    
    // Rute buat tombol Approve / Reject
    Route::patch('/admin/reservations/{id}/update-status', [ReservationController::class, 'updateStatus'])->name('admin.reservations.updateStatus');

    // Taruh kodingan ini di dalem grup auth:
    Route::resource('rooms', App\Http\Controllers\RoomController::class);
   });

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/booking', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/booking', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/history', [ReservationController::class, 'history'])->name('reservations.history');
});
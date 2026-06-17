<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
Route::redirect('/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    // Taruh kodingan ini di dalem grup auth:
    Route::resource('rooms', App\Http\Controllers\RoomController::class);
   });

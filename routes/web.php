<?php

use Illuminate\Support\Facades\Route;

// Redirect langsung ke halaman login
Route::redirect('/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
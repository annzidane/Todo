<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tambahkan middleware 'auth' pada route yang ingin diproteksi
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('pesanan.index');
});

// Pelanggan
Route::resource('pelanggan', PelangganController::class);

// Pesanan
Route::resource('pesanan', PesananController::class);

// Update status cepat
Route::patch('/pesanan/{id}/status/{status}', [PesananController::class, 'updateStatus'])
     ->name('pesanan.updateStatus');

     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsAkun;
use App\Http\Controllers\PatnerController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route untuk menampilkan halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'handleLogin'])->name('auth.handleLogin');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::get('/account/{id}', [DetailsAkun::class, 'detailsAccount'])->name('account.details');
Route::put('/account/{id}', [DetailsAkun::class, 'editAccount'])->name('account.update');

Route::get('/patner', [PatnerController::class, 'index'])->name('patner.index');
Route::get('/patner/{id}', [PatnerController::class, 'detailsPatner'])->name('patner.details');
Route::put('/patner/{id}', [PatnerController::class, 'editPatner'])->name('patner.update');

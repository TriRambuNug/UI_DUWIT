<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsAkun;
use App\Http\Controllers\PatnerController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\UserController;
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

//topup
Route::get('/topup', [TopUpController::class, 'create'])->name('admin-topup.create');
Route::post('/topup', [TopUpController::class, 'store'])->name('admin-topup.store');
Route::get('/topup-history', [TopUpController::class, 'getTopUp'])->name('admin-topup.history');

//profile
Route::get('/profile', [UserController::class, 'detailsAccount'])->name('profile.index');
Route::put('/profile/{id}', [UserController::class, 'editAccount'])->name('profile.update');
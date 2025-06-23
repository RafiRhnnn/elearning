<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RegisterUserController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\GuruOnly;
use App\Http\Middleware\SiswaOnly;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Arahkan root ke halaman login
Route::get('/', fn() => redirect()->route('login'));

// Dashboard default setelah login (kalau mau redirect berdasar role, atur di LoginController)
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile (semua role bisa akses)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminOnly::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Register User
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

    // Kelola User
    Route::get('/kelola-user', [UserManagementController::class, 'index'])->name('kelola_user');
    Route::get('/kelola-user/{user}/edit', [UserManagementController::class, 'edit'])->name('kelola_user.edit');
    Route::put('/kelola-user/{user}', [UserManagementController::class, 'update'])->name('kelola_user.update');
    Route::delete('/kelola-user/{user}', [UserManagementController::class, 'destroy'])->name('kelola_user.destroy');
});

/*
|--------------------------------------------------------------------------
| Guru Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', GuruOnly::class])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', fn() => view('guru.dashboard'))->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Siswa Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', SiswaOnly::class])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', fn() => view('siswa.dashboard'))->name('dashboard');
});

// Auth default Laravel Breeze (login, logout, dll)
require __DIR__ . '/auth.php';
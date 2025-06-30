<?php

use App\Models\User;
use App\Http\Middleware\GuruOnly;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\SiswaOnly;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PelajaranController;
use App\Http\Controllers\Admin\RegisterUserController;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Arahkan root ke halaman login
Route::get('/', fn() => redirect()->route('login'));

// Default dashboard (jika tidak pakai redirect berdasarkan role)
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
Route::middleware(['auth', AdminOnly::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard Admin dengan total user
        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                'totalUsers' => User::whereIn('role', ['guru', 'siswa'])->count(),
                'totalGuru' => User::where('role', 'guru')->count(),
                'totalSiswa' => User::where('role', 'siswa')->count(),
            ]);
        })->name('dashboard');


        // Register User (oleh admin)
        Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

        //tambahkelas
        Route::get('/tambah-kelas', [KelasController::class, 'index'])->name('kelas.index');
        Route::post('/tambah-kelas', [KelasController::class, 'store'])->name('kelas.store');

        //pelajaran
        Route::get('/pelajaran', [PelajaranController::class, 'create'])->name('pelajaran');
        Route::post('/pelajaran', [PelajaranController::class, 'store'])->name('pelajaran.store');




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
Route::middleware(['auth', GuruOnly::class])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('guru.dashboard'))->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| Siswa Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', SiswaOnly::class])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('siswa.dashboard'))->name('dashboard');
    });

// Route bawaan Laravel Breeze (login, logout, dll)
require __DIR__ . '/auth.php';

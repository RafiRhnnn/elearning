<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\GuruOnly;
use App\Http\Middleware\SiswaOnly;
use App\Http\Controllers\Admin\RegisterUserController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', \App\Http\Middleware\AdminOnly::class])->group(function () {
    Route::get('/admin/register', [RegisterUserController::class, 'create'])->name('admin.register');
    Route::post('/admin/register', [RegisterUserController::class, 'store'])->name('admin.register.store');
});

// Admin
Route::middleware(['auth', AdminOnly::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

// Guru
Route::middleware(['auth', GuruOnly::class])->group(function () {
    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    });
});

// Siswa
Route::middleware(['auth', SiswaOnly::class])->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    });
});


require __DIR__ . '/auth.php';
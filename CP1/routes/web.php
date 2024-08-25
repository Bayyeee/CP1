<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// ** untuk halaman login
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// ** MASUK KEHALAMAN DASHBOARD AWAL
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ** MASUK KEHALAMAN PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ** SUPER ADMIN
Route::get('superadmin', function () {
    return '<h1>Halo super admin<h1>';
})->middleware(['auth', 'verified', 'role:superadmin'])->name('superadmin');

// ** ADMIN
Route::get('admin', function () {
    return '<h1>Halo admin<h1>';
})->middleware(['auth', 'verified', 'role:admin'])->name('admin');

// ** PENGGUNA
Route::get('pengguna', function () {
    return '<h1>Halo Pengguna<h1>';
})->middleware(['auth', 'verified', 'role:pengguna'])->name('pengguna');

require __DIR__ . '/auth.php';

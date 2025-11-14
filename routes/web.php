<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatabaseController;

Route::get('/', function () {
    return Inertia::render('home/index', [
        'company' => [
            'name' => 'ReNew Kft.',
            'tagline' => 'Gyárilag felújított notebookok – jobb, mint az új.',
        ],
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->get('/adatbazis', [DatabaseController::class, 'index'])->name('adatbazis.index');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// Üzenetek – regisztrált felhasználóknak
Route::middleware(['auth'])->group(function () {
    Route::get('/uzenetek', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/uzenetek', [MessageController::class, 'store'])->name('messages.store');
});

// Admin – csak admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

require __DIR__.'/settings.php';

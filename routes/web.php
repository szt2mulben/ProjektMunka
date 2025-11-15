<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatabaseController;

Route::get('/', function () {
    $company = [
        'name'    => 'ReNew Kft.',
        'tagline' => 'Gyárilag felújított notebookok – jobb, mint az új.',
    ];

    return view('home.index', compact('company'));
})->name('home');

Route::middleware(['auth', 'verified'])
    ->get('/adatbazis', [DatabaseController::class, 'index'])
    ->name('adatbazis.index');

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/uzenetek', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/uzenetek', [MessageController::class, 'store'])->name('messages.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

require __DIR__.'/settings.php';

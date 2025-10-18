<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('login'); // only if you have an index.blade.php homepage
})->name('home');

Route::get('/dashboard', [PropertyController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/properties/{id}', [PropertyController::class, 'show'])
    ->name('properties.show');

// Auth routes (login, register, logout)
require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/properties/{id}/toggle', [AdminController::class, 'toggleAvailability'])->name('admin.properties.toggle');
});

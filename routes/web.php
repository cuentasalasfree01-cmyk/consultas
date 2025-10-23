<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ClientController; // Comentar esto también
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\DashboardController;

// Ruta pública de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Dashboard dinámico según rol
Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas comunes para todos los usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('custom-fields', CustomFieldController::class);
});

// Rutas solo para el administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::resource('clients', ClientController::class); // COMENTAR ESTA LÍNEA
    Route::resource('procedures', ProcedureController::class);
});

// Rutas de autenticación
require __DIR__ . '/auth.php';

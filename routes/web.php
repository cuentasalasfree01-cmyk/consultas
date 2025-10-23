<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\ProcedureController;


// Ruta pública de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Dashboard accesible para usuarios autenticados y verificados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas comunes para todos los usuarios autenticados
Route::middleware('auth')->group(function () {
    // Perfil del usuario: cliente y admin (ambos ven su perfil, pero solo el cliente usa la ruta 'profile')
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Opciones de edición/eliminación de perfil (si aplica)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Campos personalizados
    Route::resource('custom-fields', CustomFieldController::class);
});

// Rutas solo para el administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('procedures', ProcedureController::class);
    // Agrega aquí otras rutas solo para administradores
});

// Rutas solo para clientes (si tienes controladores, agrégalos aquí)
Route::middleware(['auth', 'role:cliente'])->group(function () {
    // Ejemplo de ruta exclusiva para cliente
    // Route::get('/mis-citas', [CitasController::class, 'index'])->name('cliente.citas');
});

// Rutas de autenticación
require __DIR__ . '/auth.php';

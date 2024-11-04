<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncidenciaController;

Route::view('/', 'welcome')->middleware('guest'); // Redirige a usuarios no autenticados

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Ruta para el panel de control
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth']) 
    ->name('dashboard');

// Ruta para el perfil de usuario
Route::view('/profile', 'profile')
    ->middleware(['auth']) 
    ->name('profile');

    // Rutas para la gestión de incidencias
Route::middleware(['auth'])->group(function () {
    
    Route::get('/incidencias', [IncidenciaController::class, 'index'])->name('incidencias.index');
    Route::get('/incidencias/create', [IncidenciaController::class, 'create'])->name('incidencias.create');
    Route::post('/incidencias', [IncidenciaController::class, 'store'])->name('incidencias.store');
    Route::get('/incidencias/{incidencia}/edit', [IncidenciaController::class, 'edit'])->name('incidencias.edit');
    Route::put('/incidencias/{incidencia}', [IncidenciaController::class, 'update'])->name('incidencias.update');
    Route::delete('/incidencias/{incidencia}', [IncidenciaController::class, 'destroy'])->name('incidencias.destroy');
});

require __DIR__.'/auth.php';

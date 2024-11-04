<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\IncidenciaController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/incidencias', [IncidenciaController::class, 'index']);
    Route::get('/incidencias/{id}', [IncidenciaController::class, 'show']);
    Route::post('/incidencias', [IncidenciaController::class, 'store']);
    Route::put('/incidencias/{id}', [IncidenciaController::class, 'update']);
    Route::delete('/incidencias/{id}', [IncidenciaController::class, 'destroy']);
});

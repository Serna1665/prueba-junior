<?php

use App\Http\Modules\Proyecto\Controllers\ProyectoController;
use App\Http\Modules\Usuario\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Modules\Tareas\Controllers\TareaController;

Route::prefix('usuarios')->group(function () {
    Route::controller(UsuarioController::class)->group(function () {
        Route::get('listar', 'listar');
        Route::post('crear', 'crear');
    });
});

Route::prefix('proyectos')->group(function () {
    Route::controller(ProyectoController::class)->group(function () {
        Route::post('crear', 'crear');
        Route::get('listar', 'listar');
        Route::put('actualizar/{id}', 'actualizar');
    });
});

Route::prefix('tareas')->group(function () {
    Route::controller(TareaController::class)->group(function () {
        Route::get('listar', 'listar');
        Route::post('crear', 'crear');
        Route::put('actualizar/{id}', 'actualizar');
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

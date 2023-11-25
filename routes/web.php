<?php

use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;

// Rutas públicas (sin autenticación)

// Resto de tus rutas...

Route::get('/', [EventosController::class, 'welcome'])->name('welcome');
Route::get('/comprar-boletas/{eventoId}', [CompraController::class, 'mostrarFormularioCompra'])
    ->name('comprar.boletas.formulario');
Route::post('/procesar-compra/{eventoId}', [CompraController::class, 'procesarCompra'])
    ->name('procesar.compra');
Route::get('/compra-agotada', [CompraController::class, 'compraAgotada'])->name('compra.agotada');
Route::get('/compra-exitosa/{compraId}', [CompraController::class, 'compraExitosa'])->name('compra.exitosa');

// Rutas para eventos (requieren autenticación)
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [EventosController::class, 'index'])->name('home');
    Route::post('/guardar-evento', [EventosController::class, 'guardarEvento'])->name('guardar.evento');
    Route::get('/editar-evento/{id}', [EventosController::class, 'editar'])->name('editar.evento');
    Route::get('/eliminar-evento/{id}', [EventosController::class, 'eliminar'])->name('eliminar.evento');
    Route::match(['post', 'put'], '/actualizar-evento/{id}', [EventosController::class, 'actualizar'])
        ->name('actualizar.evento');
    Route::get('/ver-evento/{id}', [EventosController::class, 'ver'])->name('ver.evento');
});

// Rutas para administradores (requieren autenticación de administrador)
Route::group(['middleware' => 'auth:admin'], function () {
    // Puedes añadir rutas específicas para administradores aquí
});

Auth::routes();

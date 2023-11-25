<?php

use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

});

Route::group(['middleware' => 'auth:admin'], function () {

});


Route::post('/guardar-evento', [EventosController::class, 'guardarEvento'])->name('guardar.evento');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('cursos', CursoController::class)->except(['index', 'show']);
    Route::resource('vehiculos', VehiculoController::class)->except(['index', 'show']);
});


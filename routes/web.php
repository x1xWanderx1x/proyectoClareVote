<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RespuestaAlumnoController;
use App\Http\Controllers\RespuestaEncuestaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\walletController;
use Illuminate\Support\Facades\Route;

// Ruta para obtener el balance
Route::get('/balance', [walletController::class, 'getBalance']);

// Rutas para las respuestas de la encuesta
Route::apiResource('respuestas', RespuestaEncuestaController::class);

// Rutas para las encuestas
// No se debe incluir un tercer argumento


    Route::get('/encuestas/create', [EncuestaController::class, 'create'])->name('encuesta.create');
    Route::post('/encuesta', [EncuestaController::class, 'store'])->name('encuesta.store');
    Route::get('/encuesta-lista', [EncuestaController::class, 'index'])->name('encuesta.index');

// Rutas para las respuestas de los alumnos
    Route::apiResource('respuestas-alumno', RespuestaAlumnoController::class);

// Otras rutas comentadas
// Route::post('/votar', [EncuestaController::class, 'votar'])->name('votar');
// Route::post('/recompensa', [EncuestaController::class, 'enviarRecompensa'])->name

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Muestra el formulario para agregar un usuario
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Almacena el nuevo usuario
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Ruta para el dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
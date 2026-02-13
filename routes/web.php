<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de autenticación - GET (mostrar formularios)
Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::get('/registro', [AuthController::class, 'RegistroForm'])->name('registro');

Route::middleware('auth')->group(function () {
    // Aquí puedes agregar más rutas que requieran autenticación
    Route::get('/home', [HomeController::class, 'home'])->name('home');

});


// Salir
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rutas de autenticación - POST (procesar formularios)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro.submit');

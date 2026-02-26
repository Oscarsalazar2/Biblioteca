<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LibrosController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de autenticación - GET (mostrar formularios)
Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::get('/registro', [AuthController::class, 'RegistroForm'])->name('registro');

// Rutas de autenticación - POST (procesar formularios)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro.submit');

Route::middleware('auth')->group(function () {
    //DASHBOARD
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    //CATEGORIAS
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    //LIBROS
    Route::get('/libros/create', [LibrosController::class, 'create'])->name('libros.create');
    Route::post('/libros', [LibrosController::class, 'store'])->name('libros.store');
    Route::get('/libros', [LibrosController::class, 'index'])->name('libros.index');
    Route::get('/libros/{id}/edit', [LibrosController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{id}', [LibrosController::class, 'update'])->name('libros.update');
    Route::delete('/libros/{id}', [LibrosController::class, 'destroy'])->name('libros.destroy');
});
// Ruta de cierre de sesión
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

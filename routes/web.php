<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main/principal');
});

Route::resources([
    "categorias" => CategoriaController::class,
    "productos" => ProductoController::class,
    "usuarios" => UsuarioController::class,
    "compras" => CompraController::class,
    "login" => LoginController::class
]);

Route::get('/login', [LoginController::class, 'Mostrarlogin'])->name('mostrarlogin');
Route::get('/registro', [LoginController::class, 'Mostrarregistro'])->name('mostrarregistro');

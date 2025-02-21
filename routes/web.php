<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::resources([
    "categorias" => CategoriaController::class,
    "productos" => ProductoController::class,
    "usuarios" => UsuarioController::class,
    "compras" => CompraController::class
]);

Route::get('panel-admin', [UsuarioController::class, 'mostrarPanelAdmin'])->name('mostrarPanelAdmin');

Route::get('crear-producto', [ProductoController::class, 'mostrarFormularioProducto'])->name('mostrarFormularioProducto');
Route::get('crear-categoria', [CategoriaController::class, 'mostrarFormularioCategoria'])->name('mostrarFormularioCategoria');


Route::get('/productos/estadisticas', [ProductoController::class, 'obtenerEstadisticas']);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('usuarios', UsuarioController::class);
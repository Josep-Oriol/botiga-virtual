<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MarcaController;

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
Route::get('login',[UsuarioController::class, 'mostrarLogin'])->name('mostrarLogin');

Route::get('productos-estadisticas', [ProductoController::class, 'mostrarEstadisticasProducto'])->name('mostrarEstadisticasProducto');
Route::get('categorias-estadisticas', [CategoriaController::class, 'mostrarEstadisticasCategoria'])->name('mostrarEstadisticasCategoria');
Route::get('usuarios-estadisticas', [UsuarioController::class, 'mostrarEstadisticasUsuario'])->name('mostrarEstadisticasUsuario');
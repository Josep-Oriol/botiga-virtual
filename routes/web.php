<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'main'])->name('main');

Route::resources([
    "categorias" => CategoriaController::class,
    "productos" => ProductoController::class,
    "usuarios" => UsuarioController::class,
    "compras" => CompraController::class,
    "estadisticas" => EstadisticaController::class,
    "carrito" => CarritoController::class
]);

Route::get('panel-admin', [UsuarioController::class, 'mostrarPanelAdmin'])->name('mostrarPanelAdmin');
Route::get('login',[UsuarioController::class, 'mostrarLogin'])->name('mostrarLogin');
Route::get('register',[UsuarioController::class,'mostrarRegister'])->name('register');

Route::get('productos-estadisticas', [ProductoController::class, 'mostrarEstadisticasProducto'])->name('mostrarEstadisticasProducto');
Route::get('categorias-estadisticas', [CategoriaController::class, 'mostrarEstadisticasCategoria'])->name('mostrarEstadisticasCategoria');
Route::get('usuarios-estadisticas', [UsuarioController::class, 'mostrarEstadisticasUsuario'])->name('mostrarEstadisticasUsuario');
Route::get('pedidos-estadisticas', [CompraController::class, 'mostrarEstadisticasCompra'])->name('mostrarEstadisticasCompra');
Route::get('estadisticas', [EstadisticaController::class, 'mostrarEstadisticas'])->name('mostrarEstadisticas');

Route::get('productos-destacados', [ProductoController::class, 'productosDestacados'])->name('productosDestacados');
Route::get('categorias-destacadas', [CategoriaController::class, 'categoriasDestacadas'])->name('categoriasDestacadas');

Route::get('productos-buscar', [BuscadorController::class, 'buscarProducto'])->name('productos.buscar');
Route::get('ver-producto/{id}', [ProductoController::class, 'verProducto'])->name('verProducto');
Route::get('ver-productos', [ProductoController::class, 'verProductos'])->name('verProductos');
Route::get('comprobar-stock/{id}', [ProductoController::class, 'comprobarStock'])->name('comprobarStock');
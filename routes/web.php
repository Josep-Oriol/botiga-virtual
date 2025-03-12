<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
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

Route::get('productos-estadisticas', [ProductoController::class, 'mostrarEstadisticasProducto'])->name('mostrarEstadisticasProducto');
Route::get('categorias-estadisticas', [CategoriaController::class, 'mostrarEstadisticasCategoria'])->name('mostrarEstadisticasCategoria');
Route::get('usuarios-estadisticas', [UsuarioController::class, 'mostrarEstadisticasUsuario'])->name('mostrarEstadisticasUsuario');
Route::get('pedidos-estadisticas', [CompraController::class, 'mostrarEstadisticasCompra'])->name('mostrarEstadisticasCompra');
Route::get('estadisticas', [EstadisticaController::class, 'mostrarEstadisticas'])->name('mostrarEstadisticas');

Route::get('productos-destacados', [ProductoController::class, 'productosDestacados'])->name('productosDestacados');

Route::get('categorias-destacadas', [CategoriaController::class, 'categoriasDestacadas'])->name('categoriasDestacadas');
Route::get('categorias-mas-vendidas', [CategoriaController::class, 'categoriasMasVendidas'])->name('categoriasMasVendidas');

Route::get('productos-buscar', [BuscadorController::class, 'buscarProducto'])->name('productos.buscar');
Route::get('ver-producto/{id}', [ProductoController::class, 'verProducto'])->name('verProducto');
Route::get('ver-productos', [ProductoController::class, 'verProductos'])->name('verProductos');
Route::get('comprobar-stock/{id}/{cantidad}', [ProductoController::class, 'comprobarStock'])->name('comprobarStock');

Route::get('/api/categorias/listar', [CategoriaController::class, 'listar']);


// routes/web.php
Route::get('login',[AuthController::class, 'showLoginForm'])->name('showLogin');
Route::post('loginPost', [AuthController::class, 'login'])->name('login');
Route::get('register',[AuthController::class,'showRegistrationForm'])->name('showRegister');
Route::get('registerPost', [AuthController::class, 'register'])->name('register');

/*Route::middleware('auth')->group(function () {

});*/
<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'main'])->name('main');

Route::resources([
    "categorias" => CategoriaController::class,
    "productos" => ProductoController::class,
    "usuarios" => UsuarioController::class,
    "compras" => CompraController::class,
    "estadisticas" => EstadisticaController::class,
    "carrito" => CarritoController::class,
    "direcciones" => DireccionesController::class
]);

//Route::get('panel-admin', [UsuarioController::class, 'mostrarPanelAdmin'])->name('mostrarPanelAdmin');

Route::get('productos-destacados', [ProductoController::class, 'productosDestacados'])->name('productosDestacados');

Route::get('categorias-destacadas', [CategoriaController::class, 'categoriasDestacadas'])->name('categoriasDestacadas');
Route::get('categorias-mas-vendidas', [CategoriaController::class, 'categoriasMasVendidas'])->name('categoriasMasVendidas');

Route::get('montar-ordenador', [ProductoController::class, 'montarOrdenador'])->name('montarOrdenador');

Route::get('productos-buscar', [BuscadorController::class, 'buscarProducto'])->name('productos.buscar');
Route::get('ver-producto/{id}', [ProductoController::class, 'verProducto'])->name('verProducto');
Route::get('ver-productos', [ProductoController::class, 'verProductos'])->name('verProductos');
Route::get('comprobar-stock/{id}/{cantidad}', [ProductoController::class, 'comprobarStock'])->name('comprobarStock');
Route::get('obtener-producto/{id}', [ProductoController::class,'obtenerProducto'])->name('obtenerProducto');

Route::get('/api/categorias/listar', [CategoriaController::class, 'listar']);

Route::get('obtener-carrito/{idUser}', [CarritoController::class, 'obtenerCarrito'])->name('carrito.obtener');
Route::delete('carrito-vaciar/{idUser}', [CarritoController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::post('carrito-agregar', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::delete('carrito-eliminar-producto/{idProducto}/{idUser}', [CarritoController::class, 'eliminarProducto'])->name('carrito.eliminarProducto');
Route::get('carrito-actualizar/{idProducto}/{idUser}', [CarritoController::class, 'actualizarCarrito'])->name('carrito.actualizar');
Route::get('comprobar-producto/{id}/{idUser}', [CarritoController::class, 'comprobarProducto'])->name('carrito.comprobarProducto');
Route::post('sumar-cantidad-producto/{id}/{idUser}/{cantidad}', [CarritoController::class, 'sumarCantidadProducto'])->name('carrito.sumarCantidadProducto');
Route::get('obtener-usuario/{id}', [UsuarioController::class, 'obtenerUsuario'])->name('obtenerUsuario');


// routes/web.php
Route::post('loginPost', [AuthController::class, 'login'])->name('loginPost');
Route::get('login',[AuthController::class, 'showLoginForm'])->name('login');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');
Route::get('register',[AuthController::class,'showRegistrationForm'])->name('showRegister');
Route::post('registerPost', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('panel-admin', [UsuarioController::class, 'mostrarPanelAdmin'])->name('mostrarPanelAdmin');


    Route::get('productos-estadisticas', [ProductoController::class, 'mostrarEstadisticasProducto'])->name('mostrarEstadisticasProducto');
    Route::get('categorias-estadisticas', [CategoriaController::class, 'mostrarEstadisticasCategoria'])->name('mostrarEstadisticasCategoria');
    Route::get('usuarios-estadisticas', [UsuarioController::class, 'mostrarEstadisticasUsuario'])->name('mostrarEstadisticasUsuario');
    Route::get('pedidos-estadisticas', [CompraController::class, 'mostrarEstadisticasCompra'])->name('mostrarEstadisticasCompra');
    Route::get('estadisticas', [EstadisticaController::class, 'mostrarEstadisticas'])->name('mostrarEstadisticas');

    Route::get('mi-perfil', [UsuarioController::class, 'mostrarMiPerfil'])->name('mostrarMiPerfil');

    Route::get('juego', [UsuarioController::class, 'juego'])->name('juego');

    Route::get('confirmar-compra', [CompraController::class, 'formularioCompra'])->name('formulario');
    Route::post('realizar-compra', [CompraController::class, 'procesar'])->name('processarCompra');
    Route::get('/compra-completada', [CompraController::class, 'completada'])->name('compraCompletada');

    Route::get('/factura/{id}', [FacturaController::class, 'generar'])->name('factura.pdf');
});
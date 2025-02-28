@extends('layouts.app')

@section('content')
    <div class="flex flex-row justify-between gap-4 py-4 px-8">
        <div class="w-2/3 flex flex-col gap-4">
            <h1 class="text-2xl font-bold">Carrito</h1>
            <hr>
            <div id="carritoProductos" class="flex flex-col gap-4"></div>
        </div>
        <div class="w-1/3 flex flex-col gap-4">
            <h1 class="text-2xl font-bold">Contenido del carrito <span id="carritoTotal"></span></h1>
            <hr>
            <div id="carritoTotal" class="flex flex-col gap-4">
                <p class="text-gray-400 font-bold">Total Productos: <span class="text-primary" id="totalProductos"></span></p>
                <p class="text-gray-400 font-bold">Total Precio: <span class="text-primary" id="totalPrecio"></span></p>
                <button class="bg-custom-dark3 text-primary p-2 rounded-md hover:bg-custom-dark3/80 transition-all duration-300" id="vaciar-carrito">Vaciar carrito</button>
                <button class="bg-primary text-custom-dark3 p-2 rounded-md hover:bg-primary/80 transition-all duration-300" id="comprar-carrito">Comprar</button>
            </div>
        </div>
    </div>
@endsection

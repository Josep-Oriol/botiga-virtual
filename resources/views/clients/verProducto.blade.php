@extends('layouts.app')

@section('title', 'Ver Producto - ' . $producto->nombre_producto)

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-row justify-between gap-4">
        <div class="space-y-6">
            <img src="{{ asset($producto->foto_portada_producto) }}" alt="{{ $producto->nombre_producto }}" class="rounded-lg shadow-lg w-full">
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="text-4xl font-bold">{{ $producto->nombre_producto }}</h1>
            <p class="text-gray-600">{{ $producto->descripcion_producto }}</p>
            <p class="text-primary font-bold text-2xl">{{ $producto->precio_producto }}</p>
            @if ($producto->stock_producto > 0)
                <p class="bg-green-500 text-white text-sm px-4 py-2 rounded-3xl w-fit">Disponible</p>
            @else
                <p class="bg-red-500 text-white text-sm px-4 py-2 rounded-3xl w-fit">No disponible</p>
            @endif
            <div id="cantidad-carrito" class="flex items-center gap-2">
                <button class="bg-custom-dark3 text-white px-4 py-2 rounded-md hover:bg-custom-dark2 transition-all duration-300" id="disminuir-cantidad-carrito">-</button>
                <p class="text-primary font-bold text-2xl" id="cantidad-carrito-valor">1</p>
                <button class="bg-custom-dark3 text-white px-4 py-2 rounded-md hover:bg-custom-dark2 transition-all duration-300" id="aumentar-cantidad-carrito">+</button>
            </div>
            <button class="bg-primary text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-all duration-300">Comprar</button>
            <button class="bg-primary text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-all duration-300">Añadir al carrito</button>
        </div>
    </div>
    <div class="flex flex-row gap-4">
        <div class="flex flex-col gap-4">
            <h2 class="text-2xl font-bold">Características</h2>
            <p class="text-gray-600">{{ $producto->descripcion_producto }}</p>
        </div>
    </div>
</div>
<script type="module" src="{{ asset('js/client/verProducto.js') }}"></script>
@endsection

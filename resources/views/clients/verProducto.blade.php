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

@endsection

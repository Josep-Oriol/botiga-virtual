@extends('layouts.app')

@section('title', 'Ver Producto - ' . $producto->nombre_producto)

@section('content')
<div class="container mx-auto px-4 py-6 md:py-8">
    <div class="flex flex-col md:flex-row justify-between gap-6 md:gap-8">
        <!-- Product Image -->
        <div class="w-full md:w-1/2 space-y-6">
            <img src="{{ asset('storage/' . $producto->foto_portada_producto) }}" 
                 alt="{{ $producto->nombre_producto }}" 
                 class="rounded-lg shadow-lg w-full object-cover max-h-[400px]">
        </div>

        <!-- Product Details -->
        <div class="w-full md:w-1/2 flex flex-col gap-4">
            <h1 class="text-2xl md:text-4xl font-bold">{{ $producto->nombre_producto }}</h1>
            <p class="text-gray-600 text-sm md:text-base">{{ $producto->descripcion_producto }}</p>
            <p class="text-primary font-bold text-xl md:text-2xl">{{ $producto->precio_producto }}</p>
            
            <!-- Stock Status -->
            @if ($producto->stock_producto > 0)
                <p class="bg-green-500 text-white text-xs md:text-sm px-4 py-2 rounded-3xl w-fit">Disponible</p>
            @else
                <p class="bg-red-500 text-white text-xs md:text-sm px-4 py-2 rounded-3xl w-fit">No disponible</p>
            @endif

            <!-- Quantity Selector -->
            <div id="cantidad-carrito" class="flex items-center gap-2">
                <button class="bg-custom-dark3 text-white px-3 md:px-4 py-2 rounded-md hover:bg-custom-dark2 transition-all duration-300" id="disminuir-cantidad-carrito">-</button>
                <p class="text-primary font-bold text-xl md:text-2xl" id="cantidad-carrito-valor">1</p>
                <button class="bg-custom-dark3 text-white px-3 md:px-4 py-2 rounded-md hover:bg-custom-dark2 transition-all duration-300" id="aumentar-cantidad-carrito">+</button>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button class="flex-1 bg-primary text-white px-4 py-2 md:py-3 rounded-md hover:bg-blue-600 transition-all duration-300 text-sm md:text-base">Comprar</button>
                <button class="flex-1 bg-primary text-white px-4 py-2 md:py-3 rounded-md hover:bg-blue-600 transition-all duration-300 text-sm md:text-base" value="{{ $producto }}" id="añadir-al-carrito">Añadir al carrito</button>
            </div>
        </div>
    </div>

    <!-- Product Characteristics -->
    <div class="mt-8 md:mt-12">
        <div class="flex flex-col gap-4">
            <h2 class="text-xl md:text-2xl font-bold">Características</h2>
            <p class="text-gray-600 text-sm md:text-base">{{ $producto->descripcion_producto }}</p>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('js/client/verProducto.js') }}"></script>
@endsection

@extends('layouts.appAdmin')

@section('title', 'Panel admin - Ver Producto')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-semibold mb-4">{{ $producto->nombre_producto }}</h1>
        
        <div class="bg-custom-dark3 p-6 rounded-3xl shadow-md">
            <p class="text-gray-400"><strong>Descripción:</strong> {{ $producto->descripcion_producto }}</p>
            <p class="text-gray-400"><strong>Código:</strong> {{ $producto->codigo_producto }}</p>
            <p class="text-gray-400"><strong>Precio:</strong> ${{ $producto->precio_producto }}</p>
            <p class="text-gray-400"><strong>Stock:</strong> {{ $producto->stock_producto }}</p>
            <p class="text-gray-400"><strong>Estado:</strong> 
                <span class="{{ $producto->activo_producto ? 'text-green-500' : 'text-red-500' }}">
                    {{ $producto->activo_producto ? 'Activo' : 'Inactivo' }}
                </span>
            </p>
        </div>

        <a href="{{ route('mostrarEstadisticasProducto') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">
            Volver a la lista de productos
        </a>
    </div>
@endsection

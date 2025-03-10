@extends('layouts.appAdmin')

@section('title', 'Panel admin - Ver Producto')

@section('content')
    <div class="p-4 md:p-6 max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">{{ $producto->nombre_producto }}</h1>
            <p class="text-gray-400">Detalles del producto</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagen del producto -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
                <div class="aspect-square rounded-lg overflow-hidden bg-custom-dark2">
                    @if($producto->foto_portada_producto)
                        <img src="{{ asset('storage/' . $producto->foto_portada_producto) }}" 
                             alt="{{ $producto->nombre_producto }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <span>Sin imagen</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Información del producto -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md space-y-4">
                <div>
                    <h2 class="text-lg font-semibold mb-4">Información General</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-400">Código:</span>
                            <span class="ml-2 text-primary font-medium">{{ $producto->codigo_producto }}</span>
                        </div>
                        <div>
                            <span class="text-gray-400">Precio:</span>
                            <span class="ml-2 font-medium">{{ $producto->precio_producto }}€</span>
                        </div>
                        <div>
                            <span class="text-gray-400">Stock:</span>
                            <span class="ml-2 {{ $producto->stock_producto > 10 ? 'text-green-500' : 'text-yellow-500' }}">
                                {{ $producto->stock_producto }} unidades
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-400">Estado:</span>
                            <span class="ml-2 px-2 py-1 rounded-full text-sm {{ $producto->activo_producto ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }}">
                                {{ $producto->activo_producto ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-400">Destacado:</span>
                            <span class="ml-2 px-2 py-1 rounded-full text-sm {{ $producto->destacado_producto ? 'bg-yellow-500/10 text-yellow-500' : 'bg-gray-500/10 text-gray-400' }}">
                                {{ $producto->destacado_producto ? 'Destacado' : 'No destacado' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-gray-400 mb-2">Descripción:</h3>
                    <p class="text-sm">{{ $producto->descripcion_producto }}</p>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <a href="{{ route('productos.edit', $producto->id) }}" 
               class="bg-primary hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Editar Producto
            </a>
            
            <a href="{{ route('mostrarEstadisticasProducto') }}" 
               class="bg-custom-dark2 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver
            </a>
        </div>
    </div>
@endsection

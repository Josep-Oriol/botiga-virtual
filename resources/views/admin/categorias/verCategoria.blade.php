@extends('layouts.appAdmin')

@section('title', 'Ver Categoria - ' . $categoria->nombre_categoria)

@section('content')
    <div class="p-4 md:p-6 max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-6">
            <div class="w-full md:w-1/3">
                <img src="{{ asset('storage/' . $categoria->imagen_categoria) }}" 
                     alt="Imagen de {{ $categoria->nombre_categoria }}" 
                     class="w-40 h-40 md:w-48 md:h-48 rounded-2xl object-cover shadow-lg mx-auto">
            </div>
            
            <div class="w-full md:w-2/3 text-center md:text-left">
                <div class="flex flex-col md:flex-row md:items-center gap-3 mb-4">
                    <h1 class="text-2xl md:text-3xl font-bold">{{ $categoria->nombre_categoria }}</h1>
                    @if($categoria->destacada_categoria)
                        <span class="inline-flex items-center gap-1 bg-yellow-500/20 text-yellow-500 px-3 py-1 rounded-full text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Categoría Destacada
                        </span>
                    @endif
                </div>
                
                <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                    <div class="inline-block px-3 py-1 rounded-full {{ $categoria->activo_categoria ? 'bg-green-500/20 text-green-500' : 'bg-red-500/20 text-red-500' }}">
                        <span class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full {{ $categoria->activo_categoria ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            {{ $categoria->activo_categoria ? 'Activo' : 'Inactivo' }}
                        </span>
                    </div>
                    <div class="inline-block px-3 py-1 rounded-full bg-primary/20 text-primary">
                        <span class="flex items-center gap-1">
                            <span class="text-sm">Código:</span>
                            {{ $categoria->codigo_categoria }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Section -->
        <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-gray-400 text-sm font-medium mb-2">Información General</h3>
                        <div class="bg-custom-dark2 p-4 rounded-lg space-y-3">
                            <div>
                                <span class="text-gray-400 text-sm">Fecha de Creación</span>
                                <p class="text-lg font-semibold">{{ $categoria->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400 text-sm">Última Actualización</span>
                                <p class="text-lg font-semibold">{{ $categoria->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <h3 class="text-gray-400 text-sm font-medium mb-2">Descripción</h3>
                        <div class="bg-custom-dark2 p-4 rounded-lg">
                            <p class="text-base leading-relaxed">
                                {{ $categoria->descripcion_categoria ?: 'Sin descripción disponible' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start">
            <a href="{{ route('mostrarEstadisticasCategoria') }}" 
               class="bg-primary hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 text-center inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                </svg>
                Volver a categorías
            </a>
            <a href="{{ route('categorias.edit', $categoria->id) }}" 
               class="bg-custom-dark2 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 text-center inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Editar categoría
            </a>
        </div>
    </div>
@endsection
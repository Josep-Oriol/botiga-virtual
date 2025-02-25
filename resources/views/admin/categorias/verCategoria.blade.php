@extends('layouts.appAdmin')

@section('title', 'Ver Categoria')

@section('content')
    @extends('layouts.appAdmin')

@section('title', 'Ver Categoria - ' . $categoria->nombre_categoria)

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-semibold mb-4">{{ $categoria->nombre_categoria }}</h1>
        <img src="{{ asset('storage/' . $categoria->imagen_categoria) }}" alt="Imagen de la categoría" class="w-40 h-40 rounded-full mb-4">
        <div class="bg-custom-dark3 p-6 rounded-3xl shadow-md">
            <p class="text-gray-400"><strong>Descripción:</strong> {{ $categoria->descripcion_categoria }}</p>
            <p class="text-gray-400"><strong>Código:</strong> {{ $categoria->codigo_categoria }}</p>
            <p class="text-gray-400"><strong>Estado:</strong> 
                <span class="{{ $categoria->activo_categoria ? 'text-green-500' : 'text-red-500' }}">
                    {{ $categoria->activo_categoria ? 'Activo' : 'Inactivo' }}
                </span>
            </p>
        </div>

        <a href="{{ route('mostrarEstadisticasCategoria') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">
            Volver a la lista de categorías
        </a>
    </div>
@endsection

@endsection
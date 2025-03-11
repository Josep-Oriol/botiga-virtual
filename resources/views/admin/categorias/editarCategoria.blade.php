@extends('layouts.appAdmin')

@section('title', 'Editar Categoria - ' . $categoria->nombre_categoria)

@section('content')
    <div class="p-4 md:p-6 max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Editar Categoría</h1>
            <p class="text-gray-400">Modifica los detalles de la categoría</p>
        </div>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data" class="bg-custom-dark3 p-6 rounded-xl shadow-md">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label for="nombre_categoria" class="block text-sm font-medium text-gray-400 mb-2">Nombre de la Categoría</label>
                        <input type="text" 
                               name="nombre_categoria" 
                               id="nombre_categoria" 
                               class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none" 
                               value="{{ $categoria->nombre_categoria }}" 
                               autocomplete="off">
                    </div>

                    <div>
                        <label for="codigo_categoria" class="block text-sm font-medium text-gray-400 mb-2">Código</label>
                        <input type="text" 
                               name="codigo_categoria" 
                               id="codigo_categoria" 
                               class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none" 
                               value="{{ $categoria->codigo_categoria }}" 
                               autocomplete="off">
                    </div>

                    <div>
                        <label for="descripcion_categoria" class="block text-sm font-medium text-gray-400 mb-2">Descripción</label>
                        <textarea name="descripcion_categoria" 
                                  id="descripcion_categoria" 
                                  rows="4" 
                                  class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none resize-none">{{ $categoria->descripcion_categoria }}</textarea>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Imagen Actual</label>
                        <img src="{{ asset('storage/' . $categoria->imagen_categoria) }}" 
                             alt="Imagen actual" 
                             class="w-40 h-40 object-cover rounded-lg mb-4">
                        
                        <label for="imagen_categoria" class="block text-sm font-medium text-gray-400 mb-2">Cambiar Imagen</label>
                        <input type="file" 
                               name="imagen_categoria" 
                               id="imagen_categoria" 
                               accept="image/*"
                               class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-primary file:text-white hover:file:bg-blue-600">
                        <div id="image-preview" class="relative mt-4 hidden">
                            <img src="" alt="Vista previa" class="w-40 h-40 object-cover rounded-lg">
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-3">
                            <label for="activo_categoria" class="text-sm font-medium text-gray-400">Estado Activo</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" 
                                       name="activo_categoria" 
                                       id="activo_categoria" 
                                       class="sr-only peer" 
                                       {{ $categoria->activo_categoria ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-custom-dark2 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>

                        <div class="flex items-center gap-3">
                            <label for="destacada_categoria" class="text-sm font-medium text-gray-400">Categoría Destacada</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" 
                                       name="destacada_categoria" 
                                       id="destacada_categoria" 
                                       class="sr-only peer" 
                                       {{ $categoria->destacada_categoria ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-custom-dark2 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-500/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 mt-8">
                <button type="submit" class="bg-primary hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Guardar Cambios
                </button>
                
                <a href="{{ route('mostrarEstadisticasCategoria') }}" class="bg-custom-dark2 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
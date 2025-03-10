@extends('layouts.appAdmin')

@section('title', 'Crear Producto')

@section('content')
    <div class="p-4 md:p-6 max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Crear Nuevo Producto</h1>
            <p class="text-gray-400">Añade un nuevo producto al catálogo</p>
        </div>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Información Principal -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-semibold mb-4">Información Principal</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="nombre_producto" class="block text-sm font-medium text-gray-400 mb-2">Nombre del Producto *</label>
                            <input type="text" 
                                   name="nombre_producto" 
                                   id="nombre_producto" 
                                   class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label for="codigo_producto" class="block text-sm font-medium text-gray-400 mb-2">Código *</label>
                            <input type="text" 
                                   name="codigo_producto" 
                                   id="codigo_producto" 
                                   class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label for="descripcion_producto" class="block text-sm font-medium text-gray-400 mb-2">Descripción</label>
                            <textarea name="descripcion_producto" 
                                     id="descripcion_producto" 
                                     rows="4" 
                                     class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="foto_portada_producto" class="block text-sm font-medium text-gray-400 mb-2">Imagen del Producto</label>
                            <input type="file" 
                                   name="foto_portada_producto" 
                                   id="foto_portada_producto" 
                                   accept="image/*"
                                   class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-primary file:text-white hover:file:bg-blue-600">
                            <div id="image-preview" class="mt-4 hidden">
                                <img src="" alt="Vista previa" class="w-40 h-40 object-cover rounded-lg">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="precio_producto" class="block text-sm font-medium text-gray-400 mb-2">Precio *</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-400">€</span>
                                    <input type="number" 
                                           name="precio_producto" 
                                           id="precio_producto" 
                                           step="0.01" 
                                           class="w-full bg-custom-dark2 text-white p-3 pl-8 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                           required>
                                </div>
                            </div>

                            <div>
                                <label for="stock_producto" class="block text-sm font-medium text-gray-400 mb-2">Stock *</label>
                                <input type="number" 
                                       name="stock_producto" 
                                       id="stock_producto" 
                                       class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                       required>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="fk_id_categoria" class="block text-sm font-medium text-gray-400 mb-2">Categoría</label>
                                <select name="fk_id_categoria" 
                                        id="fk_id_categoria" 
                                        class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none">
                                    <option value="">Seleccionar categoría</option>
                                    <!-- Add categories dynamically -->
                                </select>
                            </div>

                            <div>
                                <label for="fk_id_marca" class="block text-sm font-medium text-gray-400 mb-2">Marca</label>
                                <select name="fk_id_marca" 
                                        id="fk_id_marca" 
                                        class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none">
                                    <option value="">Seleccionar marca</option>
                                    <!-- Add brands dynamically -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estado del Producto -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-semibold mb-4">Estado del Producto</h2>
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex items-center gap-3">
                        <label for="activo_producto" class="text-sm font-medium text-gray-400">Producto Activo</label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   name="activo_producto" 
                                   id="activo_producto" 
                                   class="sr-only peer" 
                                   checked>
                            <div class="w-11 h-6 bg-custom-dark2 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <label for="destacado_producto" class="text-sm font-medium text-gray-400">Producto Destacado</label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   name="destacado_producto" 
                                   id="destacado_producto" 
                                   class="sr-only peer">
                            <div class="w-11 h-6 bg-custom-dark2 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-500/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit" class="bg-primary hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crear Producto
                </button>
                
                <a href="{{ route('mostrarEstadisticasProducto') }}" class="bg-custom-dark2 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

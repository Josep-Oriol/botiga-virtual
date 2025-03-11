@extends('layouts.appAdmin')

@section('title', 'Editar Producto')

@section('content')
    <div class="p-4 md:p-6 max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Editar Producto</h1>
            <p class="text-gray-400">Modifica los detalles del producto</p>
        </div>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-500/10 text-red-500 p-4 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                                   value="{{ old('nombre_producto', $producto->nombre_producto) }}"
                                   class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label for="codigo_producto" class="block text-sm font-medium text-gray-400 mb-2">Código *</label>
                            <input type="text" 
                                   name="codigo_producto" 
                                   id="codigo_producto" 
                                   value="{{ old('codigo_producto', $producto->codigo_producto) }}"
                                   class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label for="descripcion_producto" class="block text-sm font-medium text-gray-400 mb-2">Descripción</label>
                            <textarea name="descripcion_producto" 
                                      id="descripcion_producto" 
                                      rows="4" 
                                      class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none resize-none">{{ old('descripcion_producto', $producto->descripcion_producto) }}</textarea>
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
                            
                            @if($producto->foto_portada_producto)
                                <div class="mt-4">
                                    <div class="aspect-square w-40 rounded-lg overflow-hidden bg-custom-dark2">
                                        <img src="{{ asset('storage/' . $producto->foto_portada_producto) }}" 
                                             alt="Imagen actual" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <p class="text-sm text-gray-400 mt-2">Imagen actual</p>
                                </div>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="precio_producto" class="block text-sm font-medium text-gray-400 mb-2">Precio *</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-400">€</span>
                                    <input type="number" 
                                           name="precio_producto" 
                                           id="precio_producto" 
                                           value="{{ old('precio_producto', $producto->precio_producto) }}"
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
                                       value="{{ old('stock_producto', $producto->stock_producto) }}"
                                       class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                       required>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="fk_id_categoria" class="block text-sm font-medium text-gray-400 mb-2">Categoría *</label>
                                <select name="fk_id_categoria" 
                                        id="fk_id_categoria" 
                                        class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                        required>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" 
                                                {{ old('fk_id_categoria', $producto->fk_id_categoria) == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre_categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="fk_id_marca" class="block text-sm font-medium text-gray-400 mb-2">Marca *</label>
                                <select name="fk_id_marca" 
                                        id="fk_id_marca" 
                                        class="w-full bg-custom-dark2 text-white p-3 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                        required>
                                    @foreach($marcas as $marca)
                                        <option value="{{ $marca->id }}" 
                                                {{ old('fk_id_marca', $producto->fk_id_marca) == $marca->id ? 'selected' : '' }}>
                                            {{ $marca->nombre_marca }}
                                        </option>
                                    @endforeach
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
                                   {{ $producto->activo_producto ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-custom-dark2 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <label for="destacado_producto" class="text-sm font-medium text-gray-400">Producto Activo</label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   name="destacado_producto" 
                                   id="destacado_producto" 
                                   class="sr-only peer"
                                   {{ $producto->destacado_producto ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-custom-dark2 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-300"></div>
                        </label>
                    </div>
                    <input type="submit" value="Editar Producto" class="bg-primary px-4 py-2 rounded-lg hover:bg-primary/80 cursor-pointer">
                </div>
            </div>
@endsection

@extends('layouts.app')

@section('title', 'Ver Productos')

@section('content')
    <div class="container mx-auto px-4 py-8 flex flex-row gap-4">
        <!-- FORMULARIO DE FILTROS -->
        <form action="{{ route('verProductos') }}" method="GET" class="flex flex-col gap-6 filtros bg-custom-dark3 rounded-lg p-8 w-[20%]" id="filtros-ver-productos">
            <h2 class="text-2xl font-bold">Filtros</h2>
            <hr class="border-t border-gray-500">

            <!-- BOTÓN APLICAR FILTROS -->
            <button type="submit" class="flex flex-row items-center justify-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-600 transition-all duration-300 w-full text-center">
                Aplicar filtros
                <img src="{{ asset('icons/web/filter.svg') }}" alt="Filtros" class="w-6 h-6">
            </button>

            <!-- FILTRO POR RANGO DE PRECIOS -->
            <div class="flex flex-col gap-2">
                <h3 class="text-lg font-bold">Rango de precios</h3>
                <div class="flex flex-row items-center justify-center gap-2">
                    <input type="number" name="precio_min" id="input-precio-min" class="w-1/2 text-center text-black" placeholder="Mín" value="{{ request('precio_min') }}">
                    <p>-</p>
                    <input type="number" name="precio_max" id="input-precio-max" class="w-1/2 text-center text-black" placeholder="Máx" value="{{ request('precio_max') }}">
                </div>
            </div>

            <!-- FILTRO POR CATEGORÍAS -->
            <div class="flex flex-col gap-2">
                <h3 class="text-lg font-bold">Categorías</h3>
                <hr class="border-t border-gray-700">
                <div class="flex flex-col gap-2">
                    @foreach ($categorias as $categoria)
                        <label for="categoria-{{ $categoria->id }}">
                            <input type="checkbox" id="categoria-{{ $categoria->id }}" 
                                   name="categoria[]" {{-- Enviar como array --}}
                                   value="{{ $categoria->id }}"
                                   {{ in_array($categoria->id, request('categoria', [])) ? 'checked' : '' }}>
                            {{ $categoria->nombre_categoria }}
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- FILTRO POR MARCAS -->
            <div class="flex flex-col gap-2">
                <h3 class="text-lg font-bold">Marca</h3>
                <hr class="border-t border-gray-700">
                <div class="flex flex-col gap-2">
                    @foreach ($marcas as $marca)
                        <label for="marca-{{ $marca->id }}">
                            <input type="checkbox" id="marca-{{ $marca->id }}" 
                                   name="marca[]" {{-- Enviar como array --}}
                                   value="{{ $marca->id }}"
                                   {{ in_array($marca->id, request('marca', [])) ? 'checked' : '' }}>
                            {{ $marca->nombre_marca }}
                        </label>
                    @endforeach
                </div>
            </div>
        </form>

        <!-- LISTA DE PRODUCTOS -->
        <div class="flex flex-wrap gap-4 p-4 w-[75%]">
            @foreach ($productos as $producto)
                <div class="bg-custom-dark3 rounded-lg p-4 w-[300px] h-[300px] flex flex-col gap-4">
                    <img src="{{ asset($producto->imagen_producto) }}" alt="{{ $producto->nombre_producto }}" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-lg font-bold">{{ $producto->nombre_producto }}</h3>
                    <div class="flex flex-row justify-between">
                        <p class="text-sm text-primary font-bold">{{ number_format($producto->precio_producto, 2) }}€</p>
                        @if ($producto->stock_producto < 25)
                            <p class="text-sm text-gray-400">Últimas unidades ({{ $producto->stock_producto }})</p>
                        @endif
                    </div>
                    <a href="{{ route('verProducto', $producto->id) }}" class="bg-primary text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-600 transition-all duration-300 w-full text-center">
                        Ver más
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

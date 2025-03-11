@extends('layouts.app')

@section('title', 'Ver Productos')

@section('content')
    <div class="container mx-auto px-4 py-6 md:py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Filters Form -->
            <div class="w-full lg:w-[300px]">
                <form action="{{ route('verProductos') }}" method="GET" class="flex flex-col gap-6 bg-custom-dark3 rounded-lg p-4 md:p-8 sticky top-4" id="filtros-ver-productos">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl md:text-2xl font-bold">Filtros</h2>
                        <button type="button" class="lg:hidden bg-primary p-2 rounded-lg" id="toggle-filters">
                            <img src="{{ asset('icons/web/filter.svg') }}" alt="Toggle filters" class="w-5 h-5">
                        </button>
                    </div>
                    <hr class="border-t border-gray-500">

                    <div class="filter-content hidden lg:block">
                        <button type="submit" class="flex items-center justify-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-600 transition-all duration-300 w-full text-center text-sm md:text-base">
                            Aplicar filtros
                            <img src="{{ asset('icons/web/filter.svg') }}" alt="Filtros" class="w-5 h-5">
                        </button>

                        <div class="flex flex-col gap-2 mt-4">
                            <h3 class="text-base md:text-lg font-bold">Rango de precios</h3>
                            <div class="flex items-center gap-2">
                                <input type="number" name="precio_min" id="input-precio-min" class="w-1/2 text-center text-black text-sm p-2 rounded" placeholder="Mín" value="{{ request('precio_min') }}">
                                <p>-</p>
                                <input type="number" name="precio_max" id="input-precio-max" class="w-1/2 text-center text-black text-sm p-2 rounded" placeholder="Máx" value="{{ request('precio_max') }}">
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 mt-4">
                            <h3 class="text-base md:text-lg font-bold">Categorías</h3>
                            <hr class="border-t border-gray-700">
                            <div class="flex flex-col gap-2 max-h-[200px] overflow-y-auto">
                                @foreach ($categorias as $categoria)
                                    <label class="flex items-center gap-2 text-sm md:text-base">
                                        <input type="checkbox" id="categoria-{{ $categoria->id }}" 
                                               name="categoria[]" 
                                               value="{{ $categoria->id }}"
                                               {{ in_array($categoria->id, request('categoria', [])) ? 'checked' : '' }}>
                                        {{ $categoria->nombre_categoria }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 mt-4">
                            <h3 class="text-base md:text-lg font-bold">Marca</h3>
                            <hr class="border-t border-gray-700">
                            <div class="flex flex-col gap-2 max-h-[200px] overflow-y-auto">
                                @foreach ($marcas as $marca)
                                    <label class="flex items-center gap-2 text-sm md:text-base">
                                        <input type="checkbox" id="marca-{{ $marca->id }}" 
                                               name="marca[]" 
                                               value="{{ $marca->id }}"
                                               {{ in_array($marca->id, request('marca', [])) ? 'checked' : '' }}>
                                        {{ $marca->nombre_marca }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach ($productos as $producto)
                        <div class="producto-destacado h-[400px] flex flex-col p-4 bg-custom-dark3 rounded-lg hover:-translate-y-2 transition-all duration-300">
                            <div class="aspect-square w-full flex-shrink-0 mb-4">
                                <img src="{{ asset('storage/' . $producto->foto_portada_producto) }}" 
                                     alt="{{ $producto->nombre_producto }}"
                                     class="w-full h-full object-contain">
                            </div>
                            <div class="flex flex-col h-full justify-between">
                                <h3 class="text-base md:text-lg font-bold text-white line-clamp-2">{{ $producto->nombre_producto }}</h3>
                                <div class="mt-auto">
                                    <div class="flex justify-between items-center mb-3">
                                        <p class="text-xl font-bold text-primary">{{ number_format($producto->precio_producto, 2, ',', '.') }}€</p>
                                        @if ($producto->stock_producto < 25)
                                            <p class="text-xs text-gray-400">Últimas unidades ({{ $producto->stock_producto }})</p>
                                        @endif
                                    </div>
                                    <a href="{{ route('verProducto', $producto->id) }}" 
                                       class="block bg-primary hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold text-center transition-colors duration-200">
                                        Ver producto
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-filters').addEventListener('click', function() {
            const filterContent = document.querySelector('.filter-content');
            filterContent.classList.toggle('hidden');
        });
    </script>
@endsection

@extends('layouts.appAdmin')

@section('title', 'Panel admin - Estadísticas categorías')

@section('content')
    <div class="p-2 md:p-4">
        <!-- Título -->
        <h1 class="text-2xl md:text-3xl font-semibold mb-4">Categorías</h1>

        <!-- Tarjetas de métricas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400 text-sm md:text-base">Categorías Totales</p>
                <h2 class="text-2xl md:text-3xl font-bold" id="totalCategorias">{{ $totales }}</h2>
            </div>
            
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400 text-sm md:text-base">Categorías Activas</p>
                <h2 class="text-2xl md:text-3xl font-bold text-green-500" id="categoriasActivas">{{ $categoriasActivas }}</h2>
            </div>
        
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400 text-sm md:text-base">Categorías Inactivas</p>
                <h2 class="text-2xl md:text-3xl font-bold text-red-500" id="categoriasInactivas">{{ $categoriasInactivas }}</h2>
            </div>
        
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400 text-sm md:text-base">Productos por Categoría</p>
                <h2 class="text-2xl md:text-3xl font-bold text-primary" id="productosPorCategoria">nada</h2>
            </div>
        </div>

        <!-- Gráficos y productos populares -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <div class="flex flex-col sm:flex-row justify-between gap-2">
                    <h2 class="text-base md:text-lg font-semibold">Ventas Mensuales</h2>
                    <select id="selectMensuales"class="bg-custom-dark2 text-white p-2 rounded text-sm md:text-base">
                        <option>Este Año</option>
                        <option>Este Mes</option>
                    </select>
                </div>
                <div class="mt-4 h-32 md:h-48 bg-custom-dark2 rounded-xl flex justify-center items-center p-4 space-x-2">
                    <canvas id="masVendidas"></canvas>
                </div>
            </div>

            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <div class="flex flex-col sm:flex-row justify-between gap-2">
                    <h2 class="text-base md:text-lg font-semibold">Categorías Populares</h2>
                    <select class="bg-custom-dark2 text-white p-2 rounded text-sm md:text-base">
                        <option>Este Mes</option>
                        <option>Este Año</option>
                    </select>
                </div>
                <div class="mt-4 space-y-2"></div>
            </div>
        </div>

        <!-- Listado de productos -->
        <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <h2 class="text-base md:text-lg font-semibold">Listado de Categorías</h2>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <input type="text" 
                           placeholder="Buscar categoría..." 
                           class="w-full sm:w-auto bg-custom-dark2 text-white p-2 rounded text-sm md:text-base">
                    <select name="opcionesProducto" 
                            id="opcionesProducto" 
                            class="w-full sm:w-auto bg-custom-dark2 text-white p-2 rounded text-sm md:text-base">
                        <option value="todos">Todos</option>
                        <option value="activo">Activos</option>
                        <option value="inactivo">Inactivos</option>
                    </select>
                    <a href="{{ route('categorias.create') }}" 
                       class="w-full sm:w-auto bg-custom-dark2 text-white p-2 rounded flex items-center justify-center gap-2">
                        <img src="{{ asset('icons/admin/plus.svg') }}" alt="Añadir categoría" class="w-5 md:w-6 h-5 md:h-6">
                        <span class="text-sm md:text-base">Añadir categoría</span>
                    </a>
                </div>
            </div>
            <div id="listadoCategorias" class="mt-4"></div>
        </div>
    </div>
@endsection

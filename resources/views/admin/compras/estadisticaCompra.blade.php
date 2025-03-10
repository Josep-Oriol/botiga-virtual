@extends('layouts.appAdmin')

@section('title', 'Panel admin - Estadísticas pedidos')

@section('content')
    <div class="p-4 md:p-6 max-w-[2000px] mx-auto">
        <!-- Título -->
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Compras</h1>
            <p class="text-gray-400">Gestiona y monitorea los pedidos</p>
        </div>

        <!-- Tarjetas de métricas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md transition-transform hover:scale-105">
                <p class="text-gray-400 text-sm md:text-base">Compras Totales</p>
                <h2 class="text-2xl md:text-3xl font-bold mt-2" id="totalCompras">{{ $totales }}</h2>
            </div>
            <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md transition-transform hover:scale-105">
                <p class="text-gray-400 text-sm md:text-base">Compras Activas</p>
                <h2 class="text-2xl md:text-3xl font-bold mt-2 text-green-500" id="totalComprasActivas">{{ $comprasActivas }}</h2>
            </div>
            <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md transition-transform hover:scale-105">
                <p class="text-gray-400 text-sm md:text-base">Compras Inactivas</p>
                <h2 class="text-2xl md:text-3xl font-bold mt-2 text-red-500" id="totalComprasInactivas">{{ $comprasInactivas }}</h2>
            </div>
            <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md transition-transform hover:scale-105">
                <p class="text-gray-400 text-sm md:text-base">Total Ingresos</p>
                <h2 class="text-2xl md:text-3xl font-bold mt-2 text-primary" id="totalIngresos">0€</h2>
            </div>
        </div>

        <!-- Gráficos y compras populares -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md">
                <div class="flex flex-col sm:flex-row justify-between gap-4">
                    <h2 class="text-base md:text-lg font-semibold">Ventas Mensuales</h2>
                    <select class="bg-custom-dark2 text-white p-2 rounded text-sm md:text-base">
                        <option>Este Año</option>
                        <option>Este Mes</option>
                    </select>
                </div>
                <div class="mt-4 h-48 md:h-64 bg-custom-dark2 rounded-xl flex items-end p-4 space-x-2"></div>
            </div>

            <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md">
                <div class="flex flex-col sm:flex-row justify-between gap-4">
                    <h2 class="text-base md:text-lg font-semibold">Productos Más Vendidos</h2>
                    <select class="bg-custom-dark2 text-white p-2 rounded text-sm md:text-base">
                        <option>Este Mes</option>
                        <option>Este Año</option>
                    </select>
                </div>
                <div class="mt-4 space-y-3">
                    <!-- Ejemplo de producto popular -->
                    <div class="bg-custom-dark2 p-3 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-custom-dark3 rounded-lg"></div>
                                <div>
                                    <h3 class="font-medium">aaaaaaaa</h3>
                                </div>
                            </div>
                            <span class="text-primary font-medium">1.249€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de compras -->
        <div class="bg-custom-dark3 p-4 md:p-6 rounded-xl shadow-md">
            <div class="flex flex-col sm:flex-row justify-between gap-4 mb-6">
                <h2 class="text-base md:text-lg font-semibold">Listado de Compras</h2>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <input type="text" 
                           placeholder="Buscar compra..." 
                           class="w-full sm:w-auto bg-custom-dark2 text-white p-2 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none">
                    <select name="opcionesCompra" 
                            id="opcionesCompra" 
                            class="w-full sm:w-auto bg-custom-dark2 text-white p-2 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none">
                        <option value="todos">Todos</option>
                        <option value="activo">Activos</option>
                        <option value="inactivo">Inactivos</option>
                    </select>
                    <a href="{{ route('compras.create') }}" 
                       class="w-full sm:w-auto bg-primary hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Añadir compra</span>
                    </a>
                </div>
            </div>
            <div id="listadoCompras" class="min-h-[200px]"></div>
        </div>
    </div>
@endsection

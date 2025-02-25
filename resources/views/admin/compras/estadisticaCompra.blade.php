@extends('layouts.appAdmin')

@section('title', 'Panel admin - Estadísticas pedidos')

@section('content')
    <div>
        <!-- Título -->
        <h1 class="text-3xl font-semibold mb-4">Compras</h1>

        <!-- Tarjetas de métricas -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400">Compras Totales</p>
                <h2 class="text-3xl font-bold" id="totalCompras">{{ $totales }}</h2>
            </div>
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400">Compras Activas</p>
                <h2 class="text-3xl font-bold" id="totalComprasActivas">{{ $comprasActivas }}</h2>
            </div>
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400">Compras Inactivas</p>
                <h2 class="text-3xl font-bold" id="totalComprasInactivas">{{ $comprasInactivas }}</h2>
            </div>
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <p class="text-gray-400">Órdenes</p>
                <h2 class="text-3xl font-bold" id="totalOrdenesCompras"></h2>
            </div>
        </div>

        <!-- Gráficos y productos populares -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <div class="flex justify-between">
                    <h2 class="text-lg font-semibold">Ventas Mensuales</h2>
                    <select class="bg-custom-dark2 text-white p-2 rounded">
                        <option>Este Año</option>
                        <option>Este Mes</option>
                    </select>
                </div>
                <!-- Gráfico de barras -->
                <div class="mt-4 h-32 bg-custom-dark2 rounded-xl flex items-end p-4 space-x-2"></div>
            </div>

            <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
                <div class="flex justify-between">
                    <h2 class="text-lg font-semibold">Compras Populares</h2>
                    <select class="bg-custom-dark2 text-white p-2 rounded">
                        <option>Este Mes</option>
                        <option>Este Año</option>
                    </select>
                </div>
                <!-- Gráfico de productos populares -->
                <div class="mt-4 space-y-2"></div>
            </div>
        </div>

        <!-- Listado de productos -->
        <div class="bg-custom-dark3 p-4 rounded-xl shadow-md">
            <div class="flex justify-between">
                <h2 class="text-lg font-semibold">Listado de Compras</h2>
                <div class="flex items-center gap-4">
                    <input type="text" placeholder="Buscar compra..." class="bg-custom-dark2 text-white p-2 rounded">
                    <select name="opcionesProducto" id="opcionesProducto" class="bg-custom-dark2 text-white p-2 rounded">
                        <option value="todos">Todos</option>
                        <option value="activo">Activos</option>
                        <option value="inactivo">Inactivos</option>
                    </select>
                    <a href="{{ route('compras.create') }}" class="bg-custom-dark2 text-white p-2 rounded flex items-center gap-2">
                        <img src="{{ asset('icons/admin/plus.svg') }}" alt="Añadir compra" class="w-6 h-6">
                        <span>Añadir compra</span>
                    </a>
                </div>
            </div>
            <div id="listadoCompras"></div>
        </div>

    </div>
@endsection

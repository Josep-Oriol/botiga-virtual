@extends('layouts.appAdmin')

@section('title', 'Panel admin - Estadísticas pedidos')

@section('content')
    <div>
        <!-- Título -->
        <h1 class="text-3xl font-semibold mb-4">Estadísticas</h1>

        <!-- Gràfico Ventas -->
        <div class="mb-6 bg-custom-dark3 p-4 rounded-xl shadow-md">
            <div class="flex justify-between">
                <h2 class="text-lg font-semibold">Ventas Mensuales</h2>
                <select id="selectMasVendidas" class="bg-custom-dark2 text-white p-2 rounded">
                    <option value="hoy">Hoy</option>
                    <option value="mes">Este Mes</option>
                    <option value="año">Este Año</option>
                </select>
            </div>
            <div class="mt-4 h-32 bg-custom-dark2 rounded-xl flex items-end p-4 space-x-2"><canvas id="masVendidas"></canvas></div>
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
                <h2 class="text-lg font-semibold">Graficos de estadísticas</h2>
                <div class="flex items-center gap-4">
                    <select name="opcionesEstadistica" id="opcionesEstadistica" class="bg-custom-dark2 text-white p-2 rounded">
                        <option value="totales">Totales</option>
                        <option value="activas">Activas</option>
                        <option value="inactivas">Inactivas</option>
                        <option value="ordenes">Órdenes</option>
                    </select>
                </div>
            </div>
            <div id="estadistica"></div>
        </div>

    </div>
<script type="module" src="{{ asset('js/admin/estadisticas/main.js') }}"></script>
@endsection

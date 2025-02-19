@extends('app')

@section('title', 'Productos')

@section('content')

    <div class="flex h-screen">
        @include('admin.utils.barraNavegacion')

        <div class="content flex-1 bg-custom-dark1 p-4 text-white">
            
            <!-- Título -->
            <h2 class="text-2xl font-bold mb-4" id="titulo"></h2>

            <!-- Estadísticas Principales -->
            <div class="grid grid-cols-4 gap-4 mb-6 w-full">
                <div class="bg-custom-dark3 p-4 rounded-lg shadow-md">
                    <h3 class="text-sm font-semibold text-gray-400" id="tituloEstadisticas"></h3>
                    <p class="text-2xl font-bold">120</p>
                </div>
                <div class="bg-custom-dark3 p-4 rounded-lg shadow-md">
                    <h3 class="text-sm font-semibold text-gray-400" id="tituloActivos"></h3>
                    <p class="text-2xl font-bold">94</p>
                </div>
                <div class="bg-custom-dark3 p-4 rounded-lg shadow-md">
                    <h3 class="text-sm font-semibold text-gray-400" id="tituloInactivos"></h3>
                    <p class="text-2xl font-bold">26</p>
                </div>
                <div class="bg-custom-dark3 p-4 rounded-lg shadow-md">
                    <h3 class="text-sm font-semibold text-gray-400">Órdenes</h3>
                    <p class="text-2xl font-bold">432</p>
                </div>
            </div>


            <!-- Contenedor de Gráficos -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Ventas Mensuales -->
                <div class="bg-custom-dark3 p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Ventas Mensuales</h3>
                        <select class="bg-custom-dark1 text-white p-2 rounded">
                            <option>Este Año</option>
                            <option>Últimos 6 Meses</option>
                        </select>
                    </div>
                    <div class="h-40 bg-custom-dark2 rounded-lg"></div> <!-- Aquí iría el gráfico -->
                </div>

                <!-- Productos Populares -->
                <div class="bg-custom-dark3 p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold" id="tituloPopulares"></h3>
                        <select class="bg-custom-dark1 text-white p-2 rounded">
                            <option>Este Mes</option>
                            <option>Últimos 3 Meses</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span>Asus BZ560</span>
                            <span>75%</span>
                        </div>
                        <div class="w-full bg-custom-dark2 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 75%"></div>
                        </div>

                        <div class="flex justify-between">
                            <span>Acer x83SA</span>
                            <span>65%</span>
                        </div>
                        <div class="w-full bg-custom-dark2 rounded-full h-2">
                            <div class="bg-secondary h-2 rounded-full" style="width: 65%"></div>
                        </div>

                        <div class="flex justify-between">
                            <span>Logitech</span>
                            <span>45%</span>
                        </div>
                        <div class="w-full bg-custom-dark2 rounded-full h-2">
                            <div class="bg-primary-light h-2 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Listado de Productos -->
            <div class="bg-custom-dark3 p-6 rounded-lg shadow-md mt-6">
                <div class="flex justify-between items-center">
                    <p class="text-lg font-semibold" id="tituloListado"></p>
                    <div class="flex justify-end gap-6">
                        <input type="text" placeholder="Buscar..." class="text-gray-400 p-4 rounded-lg bg-custom-dark2 w-64">
                        <button class="bg-custom-dark1 text-gray-400 hover:text-white px-4 py-2 rounded-md flex items-center gap-2" id="crear">
                            <img src="{{ asset('icons/admin/plus.svg') }}" alt="Añadir nuevo" class="w-6 h-6"> 
                        </button>
                    </div>
                </div>
                <div class="mt-4 bg-custom-dark3 rounded-lg" id="tabla"></div>
            </div>
        </div>
    </div>
    <script type="module" src="{{ asset('js/admin/panelAdmin.js') }}"></script>
@endsection

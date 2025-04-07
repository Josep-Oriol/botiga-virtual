@extends('layouts.app')

@section('title', 'Ver Compra - ' . $compra->id)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <!-- Cabecera con botón de volver -->
        <div class="flex items-center mb-6">
            <a href="{{ route('mostrarMiPerfil') }}" class="mr-4 text-gray-400 hover:text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-white">Detalles de Compra #{{ $compra->id }}</h1>
        </div>

        <!-- Tarjeta de resumen de pedido -->
        <div class="bg-custom-dark3 rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="bg-custom-dark1 px-6 py-4 border-b border-custom-dark3">
                <h2 class="text-xl font-semibold text-white">Resumen de la Compra</h2>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Detalles del pedido -->
                    <div>
                        <h3 class="text-lg font-medium text-white mb-4">Información de la Compra</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-400">ID de Compra:</span>
                                <span class="text-white font-medium">{{ $compra->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Fecha de Compra:</span>
                                <span class="text-white font-medium">{{ \Carbon\Carbon::parse($compra->fecha_compra)->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Fecha de Envío:</span>
                                <span class="text-white font-medium">{{ \Carbon\Carbon::parse($compra->fecha_envio_compra)->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Estado:</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($compra->estado_compra == 'completa') bg-green-100 text-green-800
                                    @elseif($compra->estado_compra == 'progreso') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($compra->estado_compra) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Detalles de pago -->
                    <div>
                        <h3 class="text-lg font-medium text-white mb-4">Detalles de Pago</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Método de Pago:</span>
                                <span class="text-white font-medium">Tarjeta de Crédito</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Total:</span>
                                <span class="text-white font-bold">{{ number_format($compra->total_compra, 2, ',', '.') }}€</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de productos -->
        <div class="bg-custom-dark3 rounded-lg shadow-lg overflow-hidden">
            <div class="bg-custom-dark1 px-6 py-4 border-b border-custom-dark3">
                <h2 class="text-xl font-semibold text-white">Productos</h2>
            </div>
            
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-custom-dark2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Producto</th>
                                <th class="px-6 py-3 bg-custom-dark2 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Precio</th>
                                <th class="px-6 py-3 bg-custom-dark2 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 bg-custom-dark2 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-custom-dark2 divide-y divide-gray-700">
                            @foreach($productos as $producto)
                            <tr class="hover:bg-custom-dark1/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    Producto #{{ $producto->fk_id_producto }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-right">
                                    {{ number_format($producto->precio_producto_detalles, 2, ',', '.') }}€
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 text-right">
                                    {{ $producto->cantidad_producto_detalles }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white text-right">
                                    {{ number_format($producto->subtotal_detalles, 2, ',', '.') }}€
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-300 text-right">Total:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base font-bold text-white text-right">{{ number_format($compra->total_compra, 2, ',', '.') }}€</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="mt-8 flex justify-between">
            <a href="{{ route('mostrarMiPerfil') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-custom-dark2 hover:bg-custom-dark1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-dark3">
                Volver a Mi Perfil
            </a>
            
            <a href="{{ route('factura.pdf', ['id' => $compra->id]) }}">
                <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Descargar Factura
                </button>
            </a>
        </div>
    </div>
</div>
@endsection
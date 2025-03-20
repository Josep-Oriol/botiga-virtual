@extends('layouts.app')

@section('title', 'Mi Perfil - ' . Auth::user()->nombre_usuario)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6 text-center md:text-left text-primary">Mi Perfil</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- User Information Card -->
        <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
            <div class="flex items-center mb-6">
                <div class="bg-primary/20 p-4 rounded-full mr-4">
                    <svg class="w-8 h-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Información Personal</h2>
                    <p class="text-gray-400 text-sm">Datos de tu cuenta</p>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-400">Nombre de Usuario</label>
                    <p class="bg-custom-dark2 rounded-md p-3 border border-gray-700">{{ Auth::user()->nombre_usuario }}</p>
                </div>
                
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-400">Nombre</label>
                    <p class="bg-custom-dark2 rounded-md p-3 border border-gray-700">{{ Auth::user()->nombre_usuario }}</p>
                </div>
                
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-400">Apellidos</label>
                    <p class="bg-custom-dark2 rounded-md p-3 border border-gray-700">{{ Auth::user()->apellidos_usuario ?? 'No especificado' }}</p>
                </div>
                
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-400">Email</label>
                    <p class="bg-custom-dark2 rounded-md p-3 border border-gray-700">{{ Auth::user()->email }}</p>
                </div>
                
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-400">Teléfono</label>
                    <p class="bg-custom-dark2 rounded-md p-3 border border-gray-700">{{ Auth::user()->telefono_usuario ?? 'No especificado' }}</p>
                </div>
                
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-400">Tipo de cuenta</label>
                    <p class="bg-custom-dark2 rounded-md p-3 border border-gray-700 capitalize">{{ Auth::user()->tipo_usuario }}</p>
                </div>
                
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center bg-primary hover:bg-primary/90 text-white py-2 px-4 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        Editar información
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Addresses Section -->
        <div class="lg:col-span-2">
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md mb-6">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <div class="bg-primary/20 p-4 rounded-full mr-4">
                            <svg class="w-8 h-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">Mis Direcciones</h2>
                            <p class="text-gray-400 text-sm">Gestiona tus direcciones de envío</p>
                        </div>
                    </div>
                    <a href="{{ route('direcciones.create') }}" class="inline-flex items-center bg-primary hover:bg-primary/90 text-white py-2 px-4 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Añadir dirección
                    </a>
                </div>
                
                @if(isset($direcciones) && count($direcciones) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($direcciones as $direccion)
                            <div class="bg-custom-dark2 p-4 rounded-lg border border-gray-700 hover:border-primary transition-colors">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="font-semibold text-lg">{{ $direccion->nombre_direccion }}</h3>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('direcciones.edit', $direccion->id) }}" class="text-gray-400 hover:text-primary">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('direcciones.destroy', $direccion->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-500" onclick="return confirm('¿Estás seguro de eliminar esta dirección?')">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-gray-300">
                                    <p>{{ $direccion->direccion }}</p>
                                    <p>{{ $direccion->codigoPostal }}, {{ $direccion->ciudad }}</p>
                                    <p>{{ $direccion->provincia }}, {{ $direccion->pais }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-custom-dark2 p-6 rounded-lg border border-gray-700 text-center">
                        <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p class="text-gray-400 mb-4">No tienes direcciones guardadas</p>
                        <a href="{{ route('direcciones.create') }}" class="inline-flex items-center bg-primary hover:bg-primary/90 text-white py-2 px-4 rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Añadir tu primera dirección
                        </a>
                    </div>
                @endif
            </div>
            
            <!-- Recent Orders Section (Optional) -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
                <div class="flex items-center mb-6">
                    <div class="bg-primary/20 p-4 rounded-full mr-4">
                        <svg class="w-8 h-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">Pedidos Recientes</h2>
                        <p class="text-gray-400 text-sm">Historial de tus últimas compras</p>
                    </div>
                </div>
                
                <div class="text-center py-6">
                    @if($pedidos->isNotEmpty())
                        <table class="min-w-full bg-custom-dark2/60 rounded-lg overflow-hidden shadow-sm">
                            <thead class="bg-custom-dark2">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider text-center">ID</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider text-center">Fecha</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider text-center">Total</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider text-center">Estado</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($pedidos as $pedido)
                                    <tr class="hover:bg-custom-dark2/60 transition-colors">
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $pedido->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $pedido->total_compra }}€</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            @if ($pedido->estado_compra == 'Completado')
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completado</span>
                                            @elseif($pedido->estado_compra == 'Pendiente')
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendiente</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Cancelado</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="inline-flex items-center gap-4">
                                                <a href="{{ route('compras.show', $pedido->id) }}" class="text-gray-400 hover:text-primary">Ver</a>
                                                <a href="#" class="text-gray-400 hover:text-primary inline-flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6zm2 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm0 4a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm0 4a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-400">No tienes pedidos recientes</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
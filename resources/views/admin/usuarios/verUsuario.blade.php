@extends('layouts.appAdmin')

@section('title', 'Ver Usuario')

@section('content')
    <div class="p-4 md:p-6 max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">{{ $usuario->nombre_usuario }} {{ $usuario->apellidos_usuario }}</h1>
            <p class="text-gray-400">Detalles del usuario</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Información Personal -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold mb-4">Información Personal</h2>
                <div class="space-y-4">
                    <div>
                        <span class="text-gray-400">Nombre de usuario:</span>
                        <span class="ml-2 font-medium">{{ $usuario->usuario_usuario }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400">Nombre:</span>
                        <span class="ml-2 font-medium">{{ $usuario->nombre_usuario }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400">Apellidos:</span>
                        <span class="ml-2 font-medium">{{ $usuario->apellidos_usuario ?? 'No especificado' }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400">Email:</span>
                        <span class="ml-2 text-primary font-medium">{{ $usuario->email_usuario }}</span>
                    </div>
                </div>
            </div>

            <!-- Información de Contacto -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold mb-4">Información de Contacto</h2>
                <div class="space-y-4">
                    <div>
                        <span class="text-gray-400">Teléfono:</span>
                        <span class="ml-2 font-medium">{{ $usuario->telefono_usuario ?? 'No especificado' }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400">Dirección:</span>
                        <span class="ml-2 font-medium">{{ $usuario->direccion_usuario ?? 'No especificada' }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400">Rol:</span>
                        <span class="ml-2 px-2 py-1 rounded-full text-sm {{ $usuario->tipo_usuario === 'admin' ? 'bg-purple-500/10 text-purple-500' : 'bg-blue-500/10 text-blue-500' }}">
                            {{ ucfirst($usuario->tipo_usuario) }}
                        </span>
                    </div>
                    <div>
                        <span class="text-gray-400">Estado:</span>
                        <span class="ml-2 px-2 py-1 rounded-full text-sm {{ $usuario->activo_usuario ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }}">
                            {{ $usuario->activo_usuario ? 'Activo' : 'Inactivo' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Fechas -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md md:col-span-2">
                <h2 class="text-lg font-semibold mb-4">Actividad de la Cuenta</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <span class="text-gray-400">Creación de la cuenta:</span>
                        <div class="mt-1 font-medium">{{ $usuario->created_at->format('d/m/Y') }}
                            <span class="text-sm text-gray-400">{{ $usuario->created_at->format('H:i') }}</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-gray-400">Última actualización:</span>
                        <div class="mt-1 font-medium">{{ $usuario->updated_at->format('d/m/Y') }}
                            <span class="text-sm text-gray-400">{{ $usuario->updated_at->format('H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Historial de Pedidos -->
            <div class="bg-custom-dark3 p-6 rounded-xl shadow-md md:col-span-2">
                <h2 class="text-lg font-semibold mb-4">Historial de Pedidos</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <a href="{{ route('usuarios.edit', $usuario->id) }}" 
               class="bg-primary hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Editar Usuario
            </a>

            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Eliminar Usuario
                </button>
            </form>

            <a href="{{ route('mostrarEstadisticasUsuario') }}" 
               class="bg-custom-dark2 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver
            </a>
        </div>
    </div>
@endsection
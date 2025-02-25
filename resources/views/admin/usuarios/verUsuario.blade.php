@extends('layouts.appAdmin')

@section('title', 'Ver Usuario')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{ $usuario->nombre_usuario }}</h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Editar</a>
                <a href="{{ route('usuarios.destroy', $usuario->id) }}" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</a>
            </div>
        </div>
        <div class="mt-4">
            <h2 class="text-xl font-bold">Información del Usuario</h2>
            <p class="mt-2">
                <strong>Nombre:</strong> {{ $usuario->nombre_usuario }}
            </p>
            <p class="mt-2">
                <strong>Email:</strong> {{ $usuario->email_usuario }}
            </p>
            <p class="mt-2">
                <strong>Rol:</strong> {{ $usuario->tipo_usuario }}
            </p>
            <p class="mt-2">
                <strong>Activo:</strong> {{ $usuario->activo_usuario ? 'Si' : 'No' }}
            </p>
            <p class="mt-2">
                <strong>Fecha de creación:</strong> {{ $usuario->created_at->format('d/m/Y H:i:s') }}
            </p>
            <p class="mt-2">
                <strong>Fecha de actualización:</strong> {{ $usuario->updated_at->format('d/m/Y H:i:s') }}
            </p>
        </div>

    </div>
@endsection
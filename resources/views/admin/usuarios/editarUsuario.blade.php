@extends('layouts.appAdmin')

@section('title', 'Editar Usuario - ' . $usuario->nombre_usuario)

@section('content')
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="usuario_usuario" class="block text-gray-700">Usuario</label>
            <input type="text" name="usuario_usuario" id="usuario_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->usuario_usuario }}">
        </div>
        <div class="mb-4">
            <label for="nombre_usuario" class="block text-gray-700">Nombre</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->nombre_usuario }}">
        </div>
        <div class="mb-4">
            <label for="apellidos_usuario" class="block text-gray-700">Apellidos</label>
            <input type="text" name="apellidos_usuario" id="apellidos_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->apellidos_usuario }}">
        </div>
        <div class="mb-4">
            <label for="email_usuario" class="block text-gray-700">Email</label>
            <input type="email" name="email_usuario" id="email_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->email_usuario }}">
        </div>
        <div class="mb-4">
            <label for="telefono_usuario" class="block text-gray-700">Teléfono</label>
            <input type="text" name="telefono_usuario" id="telefono_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->telefono_usuario }}">
        </div>
        <div class="mb-4">
            <label for="direccion_usuario" class="block text-gray-700">Dirección</label>
            <input type="text" name="direccion_usuario" id="direccion_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->direccion_usuario }}">
        </div>
        <div class="mb-4">
            <label for="password_usuario" class="block text-gray-700">Contraseña</label>
            <input type="password" name="password_usuario" id="password_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2">
        </div>
        <div class="mb-4">
            <label for="tipo_usuario" class="block text-gray-700">Rol</label>
            <select name="tipo_usuario" id="tipo_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2">
                <option value="admin" {{ $usuario->tipo_usuario == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="comprador" {{ $usuario->tipo_usuario == 'comprador' ? 'selected' : '' }}>Comprador</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="activo_usuario" class="block text-gray-700">Activo</label>
            <input type="checkbox" name="activo_usuario" id="activo_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" {{ $usuario->activo_usuario ? 'checked' : '' }}>
        </div>
        <input type="submit" value="Guardar" class="bg-blue-500 text-white px-4 py-2 rounded-md">
    </form>
@endsection
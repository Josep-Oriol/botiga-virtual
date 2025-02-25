@extends('layouts.appAdmin')

@section('title', 'Editar Usuario')

@section('content')
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre_usuario" class="block text-gray-700">Nombre</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->nombre_usuario }}">
        </div>
        <div class="mb-4">
            <label for="email_usuario" class="block text-gray-700">Email</label>
            <input type="email" name="email_usuario" id="email_usuario" class="mt-1 block w-full rounded-md bg-gray-800 text-white px-4 py-2" value="{{ $usuario->email_usuario }}">
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
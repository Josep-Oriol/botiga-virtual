@extends('layouts.appAdmin')

@section('title', 'Crear Categoria')

@section('content')

<form action="{{ route ('categorias.store') }}" method="POST">
    @csrf
    <label for="nombre_categoria">Nombre categoria</label><br>
    <input type="text" name="nombre_categoria" id="nombre_categoria" class="bg-custom-dark2 text-white p-2 rounded" required autocomplete="off"><br><br>
    <label for="codigo_categoria">Codigo categoria</label><br>
    <input type="text" name="codigo_categoria" id="codigo_categoria" class="bg-custom-dark2 text-white p-2 rounded" autocomplete="off"><br><br>
    <label for="descripcion_categoria">Descripcion categoria</label><br>
    <input type="text" name="descripcion_categoria" id="descripcion_categoria" class="bg-custom-dark2 text-white p-2 rounded" autocomplete="off"><br><br>
    <label for="imagen_categoria">Imagen categoria</label><br>
    <input type="file" name="imagen_categoria" id="imagen_categoria" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
    <label for="activo_categoria">Activo</label>
    <input type="checkbox" name="activo_categoria" id="activo_categoria" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
    <input type="submit" value="Enviar" class="bg-custom-dark2 text-white p-2 rounded">
</form>

@endsection
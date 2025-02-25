@extends('layouts.appAdmin')

@section('title', 'Editar Categoria')

@section('content')
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_categoria">Nombre categoria</label>
        <input type="text" name="nombre_categoria" id="nombre_categoria" class="bg-custom-dark2 text-white p-2 rounded" value="{{ $categoria->nombre_categoria }}" autocomplete="off"><br><br>
        <label for="codigo_categoria">Codigo categoria</label>
        <input type="text" name="codigo_categoria" id="codigo_categoria" class="bg-custom-dark2 text-white p-2 rounded" value="{{ $categoria->codigo_categoria }}" autocomplete="off"><br><br>
        <label for="descripcion_categoria">Descripcion categoria</label>
        <input type="text" name="descripcion_categoria" id="descripcion_categoria" class="bg-custom-dark2 text-white p-2 rounded" value="{{ $categoria->descripcion_categoria }}" autocomplete="off"><br><br>
        <label for="imagen_categoria">Imagen categoria</label>
        <input type="file" name="imagen_categoria" id="imagen_categoria" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
        <label for="activo_categoria">Activo</label>
        <input type="checkbox" name="activo_categoria" id="activo_categoria" class="bg-custom-dark2 text-white p-2 rounded" value="{{ $categoria->activo_categoria }}" autocomplete="off"><br><br>
        <input type="submit" value="Editar" class="bg-custom-dark2 text-white p-2 rounded">
    </form>
@endsection
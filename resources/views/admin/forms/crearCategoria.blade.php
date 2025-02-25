@extends('admin.appAdmin')

@section('title', 'Productos')

@section('content')

<form action="{{ route ('categorias.store') }}" method="POST">
    @csrf
    <label for="nombre_categoria">Nombre categoria</label><br>
    <input type="text" name="nombre_categoria" id="nombre_categoria" required><br><br>
    <label for="codigo_categoria">Codigo categoria</label><br>
    <input type="text" name="codigo_categoria" id="codigo_categoria"><br><br>
    <input type="submit" value="Enviar">
</form>

@endsection
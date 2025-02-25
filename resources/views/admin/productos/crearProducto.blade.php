@extends('layouts.appAdmin')

@section('title', 'Crear Producto')

@section('content')
    <form action="{{ route ('productos.store') }}" method="POST">
        @csrf
        <label for="nombre_producto">Nombre producto</label><br>
        <input type="text" name="nombre_producto" id="nombre_producto" required><br><br>
        <label for="descripcion_producto">Descripcion producto</label><br>
        <input type="text" name="descripcion_producto" id="descripcion_producto"><br><br>
        <label for="codigo_producto">Codigo Producto</label><br>
        <input type="text" name="codigo_producto" id="codigo_producto"><br><br>
        <label for="precio_producto">Precio</label>
        <input type="number" name="precio_producto" id="precio_producto"><br><br>
        <label for="stock_producto">Stock producto</label>
        <input type="number" name="stock_producto" id="stock_producto"><br><br>
        <label for="destacado_producto"></label>
        <input type="checkbox" name="destacado_producto" id="destacado_producto"><br><br>
        <label for="activo_producto">Activo</label>
        <input type="checkbox" name="activo_producto" id="activo_producto"><br><br>
        <input type="submit" value="Enviar">
    </form>
@endsection

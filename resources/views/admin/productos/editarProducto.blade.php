@extends('layouts.appAdmin')

@section('title', 'Editar Producto')

@section('content')
    <form action="{{ route ('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_producto">Nombre producto</label><br>
        <input type="text" name="nombre_producto" id="nombre_producto" class="bg-custom-dark2 text-white p-2 rounded" value="{{ $producto->nombre_producto }}" required><br><br>
        <label for="descripcion_producto">Descripcion producto</label><br>
        <input type="text" name="descripcion_producto" id="descripcion_producto" class="bg-custom-dark2 text-white p-2 rounded" value="{{ $producto->descripcion_producto }}"><br><br>
        <label for="codigo_producto">Codigo Producto</label><br>
        <input type="text" name="codigo_producto" id="codigo_producto" value="{{ $producto->codigo_producto }}" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
        <label for="precio_producto">Precio</label>
        <input type="number" name="precio_producto" id="precio_producto" value="{{ $producto->precio_producto }}" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
        <label for="categoria_producto">Categoria</label>
        <select name="categoria_producto" id="categoria_producto" class="bg-custom-dark2 text-white p-2 rounded">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
            @endforeach
        </select><br><br>
        <label for="stock_producto">Stock producto</label>
        <input type="number" name="stock_producto" id="stock_producto" value="{{ $producto->stock_producto }}" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
        <label for="destacado_producto">Destacado</label>
        <input type="checkbox" name="destacado_producto" id="destacado_producto" value="{{ $producto->destacado_producto }}" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
        <label for="activo_producto">Activo</label>
        <input type="checkbox" name="activo_producto" id="activo_producto" value="{{ $producto->activo_producto }}" class="bg-custom-dark2 text-white p-2 rounded"><br><br>
        <input type="submit" value="Enviar" class="bg-custom-dark2 text-white p-2 rounded">
    </form>
@endsection

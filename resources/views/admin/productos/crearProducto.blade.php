@extends('layouts.appAdmin')

@section('title', 'Crear Producto')

@section('content')
    <div class="flex flex-col gap-4">
        <h1 class="text-3xl font-bold">Crear Producto</h1>
        <div class="flex flex-col gap-4">
            <form action="{{ route ('productos.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                <div class="flex gap-4 border-2 border-gray-400 rounded-md p-4 bg-custom-dark3">
                    <h2 class="text-2xl font-bold">Datos del principales del producto</h2>
                    <div class="flex gap-4">
                        <input type="file" name="foto_portada_producto" id="foto_portada_producto">
                    </div>
                    <div>
                        <div class="flex flex-col gap-2 w-[50%]">
                            <label for="nombre_producto">Nombre producto</label>
                            <input type="text" name="nombre_producto" id="nombre_producto" required>
                        </div>
                        <div class="flex flex-col gap-2 w-[50%]">
                            <label for="codigo_producto">Codigo Producto</label>
                            <input type="text" name="codigo_producto" id="codigo_producto">
                        </div>
                    </div>
                </div>
                <label for="descripcion_producto">Descripcion producto</label>
                <input type="text" name="descripcion_producto" id="descripcion_producto">
                <label for="codigo_producto">Codigo Producto</label>
                <input type="text" name="codigo_producto" id="codigo_producto">
                <label for="precio_producto">Precio</label>
                <input type="number" name="precio_producto" id="precio_producto">
                <label for="stock_producto">Stock producto</label>
                <input type="number" name="stock_producto" id="stock_producto">
                <label for="destacado_producto">Destacado</label>
                <input type="checkbox" name="destacado_producto" id="destacado_producto">
                <label for="activo_producto">Activo</label>
                <input type="checkbox" name="activo_producto" id="activo_producto">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    <script type="module" src="{{ asset('js/admin/productos/crearProducto.js') }}"></script>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    <h2>Crear Producto</h2>
    <form action="{{route('productos.store')}}" method="POST">
    @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre_categoria">

        <label for="codigo">Codigo Categoria</label>
        <input type="text" name="codigo_categoria">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
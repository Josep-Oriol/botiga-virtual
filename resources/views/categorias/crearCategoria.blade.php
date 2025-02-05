<h1>Categoria</h1>
<form action="{{route('categorias.store')}}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre_categoria">

    <label for="codigo">Codigo Categoria</label>
    <input type="text" name="codigo_categoria">

    <input type="submit" value="Enviar">
</form>
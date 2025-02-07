<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
    </head>
    <body>
        <h1>Registro</h1>
        <form action="{{route('usuarios.store')}}" method="post">
            @csrf
            <input type="text" name="nombre_usuario" placeholder="Nombre de usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Registrarse</button>
        </form>
    </body>
</html>
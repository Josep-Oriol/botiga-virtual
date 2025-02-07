<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{route('usuarios.store')}}" method="post">
        @csrf
        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Iniciar sesión</button>
        <a href="{{route('mostrarregistro')}}">Registrarse</a>
    </form>
</body>
</html>
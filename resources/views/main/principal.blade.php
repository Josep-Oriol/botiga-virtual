<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <title>Pc Markt</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="localhost:8000"> 
                    <img src="" alt="Logo">
                </a>
            </div>

            <nav>
                <ul>
                    <li><a href="{{route('categorias.create')}}">Categorias</a></li>
                    <li><input type="text" placeholder="Buscar..." id="buscadorHeader"></li>
                    <li><a href="">Mi Cuenta</a></li>
                    <li><a href="">Mi Cesta</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div>
        <h2>Construye el ordenador de tus sueños</h2>
        <a href="#">Montar PC</a>
    </div>
    <div>
        <h2>Categorias</h2>
        <div>
            <!-- Secciones de la tienda hechas con php-->
        </div>
    </div>
    <div>
        <div>Productos Destacados</div>
        <a href="#">Ver más</a>
    </div>
    <div>
        <!-- Productos destacados de la tienda hecho con php-->
    </div>
    <div>
        <div>
            <img src="#" alt="Envio Icon">
            <p>Envio Gratis</p>
            <p>En pedidos superiores a 999€</p>
        </div>
        <div>
            <img src="#" alt="Cascos Icon">
            <p>24/7 Support</p>
            <p>Expertos en asistencia</p>
        </div>
        <div>
            <img src="#" alt="Envio Icon">
            <p>Pago Seguro</p>
            <p>Transacciones 100% segura</p>
        </div>
    </div>
    <footer>
        <div>
            <div>
                <img src="#" alt="Logo Icon">
            </div>
            <div>
                <p>Links</p>
                <div>
                    <a href="#">Sobre Nosotros</a>
                    <a href="#">Contacto</a>
                    <a href="#">FAQ</a>
                </div>
            </div>
            <div>
                <p>Soporte</p>
                <div>
                    <a href="#">Información de envio</a>
                    <a href="#">Devoluciones</a>
                    <a href="#">Opciones de envio</a>
                    <a href="#">Metodos de pagos</a>
                </div>
            </div>
        </div>
        <div>
            <p>@ 2025 PC Markt. Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>


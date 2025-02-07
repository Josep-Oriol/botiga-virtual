<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Markt</title>
</head>
<body>

    <!-- Header -->
    <header>
        <div>
            <div class="logo">
                <a href="/">&lt;PC MARKT/&gt;</a>
            </div>
            <nav>
                <a href="{{route('categorias.create')}}">Categorías</a>
                <input type="text" placeholder="Buscar...">
                <a href="{{route('mostrarlogin')}}">Mi Cuenta</a>
                <a href="#">Mi Cesta</a>
            </nav>
        </div>
    </header>

    <!-- Sección Principal -->
    <section>
        <h2>Construye el ordenador de tus sueños</h2>
        <a href="#">Montar PC</a>
    </section>

    <!-- Categorías -->
    <section>
        <h2>Categorías</h2>
        <div>
            <div>Procesadores</div>
            <div>Monitores</div>
            <div>RAM</div>
            <div>Almacenamiento</div>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section>
        <div>
            <div>
                <h2>Productos Destacados</h2>
                <a href="#">Ver más</a>
            </div>
            <div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </section>

    <!-- Información de Servicios -->
    <section>
        <div>
            <div>
                <p>🚚 Envío Gratis</p>
                <p>En pedidos superiores a 999€</p>
            </div>
            <div>
                <p>🎧 24/7 Support</p>
                <p>Expertos en asistencia</p>
            </div>
            <div>
                <p>💳 Pago Seguro</p>
                <p>Transacciones 100% seguras</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div>
            <div>
                <p>&lt;PC MARKT/&gt;</p>
            </div>
            <div>
                <p>Enlaces</p>
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div>
                <p>Soporte</p>
                <ul>
                    <li><a href="#">Información de Envío</a></li>
                    <li><a href="#">Devoluciones</a></li>
                    <li><a href="#">Opciones de Envío</a></li>
                    <li><a href="#">Métodos de Pago</a></li>
                </ul>
            </div>
        </div>
        <div>
            <p>&copy; 2025 PC Markt. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>

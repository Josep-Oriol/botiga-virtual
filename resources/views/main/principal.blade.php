<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Markt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="bg-gray-900 border-b border-gray-800">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold text-blue-500">
                    <a href="#">&lt;PC MARKT/&gt;</a>
                </div>
                <nav class="flex items-center space-x-6">
                    <div class="flex">
                        <img src="/icons/ram.png" alt="Categorias">
                        <a href="#" class="text-gray-300 hover:text-white">Categorías</a>
                    </div>
                    
                    <input type="text" placeholder="Buscar..." class="bg-gray-800 text-white px-4 py-2 rounded-lg">
                    <a href="{{route('mostrarPanelAdmin')}}" class="text-gray-300 hover:text-white">Mi Cuenta</a>
                    <a href="#" class="text-gray-300 hover:text-white">Mi Cesta</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-900 to-purple-900 py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Construye el ordenador de tus sueños</h2>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 px-8 py-3 rounded-lg font-semibold">Montar PC</a>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Categorías</h2>
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-gray-800 p-3 rounded-lg text-center">
                    <img src="/icons/processor.png" alt="Procesadores" class="w-12 h-12 mx-auto mb-4">
                    <span>Procesadores</span>
                </div>
                <div class="bg-gray-800 p-3 rounded-lg text-center">
                    <img src="/icons/monitor.png" alt="Monitores" class="w-12 h-12 mx-auto mb-4">
                    <span>Monitores</span>
                </div>
                <div class="bg-gray-800 p-3 rounded-lg text-center">
                    <img src="/icons/ram.png" alt="RAM" class="w-12 h-12 mx-auto mb-4">
                    <span>RAM</span>
                </div>
                <div class="bg-gray-800 p-3 rounded-lg text-center">
                    <img src="/icons/storage.png" alt="Almacenamiento" class="w-12 h-12 mx-auto mb-4">
                    <span>Almacenamiento</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">Productos Destacados</h2>
                <a href="#" class="text-blue-500 hover:text-blue-400">Ver más</a>
            </div>
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-gray-800 rounded-lg p-4">
                    <img src="/products/rtx4080.png" alt="RTX 4080" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="font-semibold mb-2">RTX 4080 GAMING</h3>
                    <p class="text-blue-500 font-bold">€799</p>
                    <button class="w-full bg-blue-500 hover:bg-blue-600 py-2 rounded-lg mt-4">Añadir al Carrito</button>
                </div>
                <!-- Repeat for other products -->
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="py-16 bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 gap-8">
                <div class="text-center">
                    <img src="/icons/shipping.png" alt="Envío" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold mb-2">Envío Gratis</p>
                    <p class="text-gray-400">En pedidos superiores a 999€</p>
                </div>
                <div class="text-center">
                    <img src="/icons/support.png" alt="Soporte" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold mb-2">24/7 Support</p>
                    <p class="text-gray-400">Expertos en asistencia</p>
                </div>
                <div class="text-center">
                    <img src="/icons/payment.png" alt="Pago" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold mb-2">Pago Seguro</p>
                    <p class="text-gray-400">Transacciones 100% seguras</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 gap-8 mb-8">
                <div>
                    <p class="text-2xl font-bold text-blue-500 mb-4">&lt;PC MARKT/&gt;</p>
                </div>
                <div>
                    <p class="font-semibold mb-4">Enlaces</p>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Sobre Nosotros</a></li>
                        <li><a href="#" class="hover:text-white">Contacto</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold mb-4">Soporte</p>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Información de Envío</a></li>
                        <li><a href="#" class="hover:text-white">Devoluciones</a></li>
                        <li><a href="#" class="hover:text-white">Opciones de Envío</a></li>
                        <li><a href="#" class="hover:text-white">Métodos de Pago</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-gray-400 pt-8 border-t border-gray-800">
                <p>&copy; 2025 PC Markt. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
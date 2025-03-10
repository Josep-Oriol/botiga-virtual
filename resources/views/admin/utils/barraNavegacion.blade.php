<aside class="h-screen bg-custom-dark1 p-2 md:p-4 flex flex-col justify-between transition-all duration-300">
    <div class="flex-grow overflow-y-auto scrollbar-thin scrollbar-thumb-custom-dark2 scrollbar-track-custom-dark1">
        <div class="space-y-2 flex flex-col">
            <!-- Logo y Dashboard -->
            <div class="flex items-center justify-center md:justify-start gap-3 p-3 cursor-pointer text-white font-bold hover:bg-custom-dark2 rounded-xl transition-colors" id="dashboard">
                <img src="{{ asset('logos/logo.webp') }}" alt="Logo" class="w-8 h-8 md:w-10 md:h-10">
                <span class="text-lg md:text-xl hidden md:block">Dashboard</span>
            </div>

            <!-- Enlaces de navegación -->
            <nav class="space-y-1">
                <a href="{{ route('mostrarEstadisticas') }}" class="flex items-center justify-center md:justify-start gap-3 p-3 text-gray-300 hover:text-white hover:bg-custom-dark2 rounded-xl transition-all group">
                    <img src="{{ asset('icons/web/estats.svg') }}" alt="Estadísticas" class="w-6 h-6 md:w-7 md:h-7 group-hover:scale-110 transition-transform brightness-0 invert">
                    <span class="text-lg hidden md:block">Estadísticas</span>
                </a>

                <a href="{{ route('mostrarEstadisticasCategoria') }}" class="flex items-center justify-center md:justify-start gap-3 p-3 text-gray-300 hover:text-white hover:bg-custom-dark2 rounded-xl transition-all group">
                    <img src="{{ asset('icons/web/category.svg') }}" alt="Categorías" class="w-6 h-6 md:w-7 md:h-7 group-hover:scale-110 transition-transform brightness-0 invert">
                    <span class="text-lg hidden md:block">Categorías</span>
                </a>

                <a href="{{ route('mostrarEstadisticasProducto') }}" class="flex items-center justify-center md:justify-start gap-3 p-3 text-gray-300 hover:text-white hover:bg-custom-dark2 rounded-xl transition-all group">
                    <img src="{{ asset('icons/web/packages.svg') }}" alt="Productos" class="w-6 h-6 md:w-7 md:h-7 group-hover:scale-110 transition-transform brightness-0 invert">
                    <span class="text-lg hidden md:block">Productos</span>
                </a>

                <a href="{{ route('mostrarEstadisticasUsuario') }}" class="flex items-center justify-center md:justify-start gap-3 p-3 text-gray-300 hover:text-white hover:bg-custom-dark2 rounded-xl transition-all group">
                    <img src="{{ asset('icons/web/users.svg') }}" alt="Usuarios" class="w-6 h-6 md:w-7 md:h-7 group-hover:scale-110 transition-transform brightness-0 invert">
                    <span class="text-lg hidden md:block">Usuarios</span>
                </a>

                <a href="{{ route('mostrarEstadisticasCompra') }}" class="flex items-center justify-center md:justify-start gap-3 p-3 text-gray-300 hover:text-white hover:bg-custom-dark2 rounded-xl transition-all group">
                    <img src="{{ asset('icons/web/truck.svg') }}" alt="Compras" class="w-6 h-6 md:w-7 md:h-7 group-hover:scale-110 transition-transform brightness-0 invert">
                    <span class="text-lg hidden md:block">Compras</span>
                </a>
            </nav>
        </div>
    </div>

    <!-- Botón de salida -->
    <a href="{{ route('main') }}" class="flex items-center justify-center md:justify-start gap-3 p-3 text-gray-300 hover:text-white hover:bg-custom-dark2 rounded-xl transition-all group mt-auto">
        <img src="{{ asset('icons/web/logout.svg') }}" alt="Salir" class="w-6 h-6 md:w-7 md:h-7 group-hover:scale-110 transition-transform brightness-0 invert">
        <span class="text-lg hidden md:block">Salir</span>
    </a>
</aside>
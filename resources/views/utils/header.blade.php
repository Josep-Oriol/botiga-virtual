<header class="bg-custom-dark1 border-b border-gray-800 py-4">
    <div class="container mx-auto flex items-center justify-between px-4">
        
    <div class="text-2xl font-bold text-primary flex items-center space-x-2">
        <a href="{{ route('main') }}">
            <img src="{{ asset('logos/logo_misma_linea.webp') }}" alt="PC Markt Logo" class="h-8 w-auto">
        </a>
    </div>
        <nav class="flex items-center space-x-6 text-gray-300">
            
        <a href="#" class="flex items-center space-x-2 hover:text-white">
            <svg class="w-6 h-6 text-gray-300 stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <line x1="3" y1="6" x2="21" y2="6" stroke-linecap="round"/>
                <line x1="3" y1="12" x2="21" y2="12" stroke-linecap="round"/>
                <line x1="3" y1="18" x2="21" y2="18" stroke-linecap="round"/>
            </svg>
            <span class="text-gray-300 text-lg">Categorías</span>
        </a>

            <div class="relative w-64">
                <input type="text" placeholder="Buscar..." class="bg-custom-dark2 text-white p-2 rounded-lg pl-10 focus:outline-none" id="buscarProducto" name="nombre" autocomplete="off">
                <img src="{{ asset('icons/web/search.svg') }}" alt="Buscar" class="w-6 h-6 absolute left-2 top-1/2 transform -translate-y-1/2">
                <div id="resultadosBusqueda" class="absolute top-full left-0 w-full bg-custom-dark2 z-10 p-2 hidden"></div>
            </div>

            <a href="{{ route('mostrarEstadisticas') }}" class="flex items-center space-x-2 hover:text-white">
                <svg class="w-6 h-6 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7z"/>
                </svg>
                <span>Mi cuenta</span>
            </a>

            <a href="#" class="flex items-center space-x-2 hover:text-white">
                <svg class="w-6 h-6 text-gray-300 fill-none stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M3 3h2l3 10h10l3-7H6" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="9" cy="20" r="1"/>
                    <circle cx="18" cy="20" r="1"/>
                </svg>
                <span class="text-gray-300 text-lg">Mi cesta</span>
            </a>

            <a href="{{ route('mostrarLogin') }}" class="flex items-center space-x-2 hover:text-white">
                <svg class="w-6 h-6 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7z"/>
                </svg>
                <span>Log In / Registro</span>
            </a>     
        </nav>
    </div>
</header>
<script type="module" src="{{ asset('js/header/buscador.js') }}"></script>

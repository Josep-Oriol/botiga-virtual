<header class="flex flex-wrap justify-between items-center bg-custom-dark1 border-b border-gray-800/50 py-4 px-4 md:px-8 backdrop-blur-sm sticky top-0 z-50 shadow-lg">     
    <div class="text-2xl font-bold text-primary flex items-center pr-14 space-x-2">
        <a href="{{ route('main') }}" class="transition-transform hover:scale-105">
            <img src="{{ asset('logos/logo_misma_linea.webp') }}" alt="PC Markt Logo" class="h-6 md:h-8 w-auto">
        </a>
    </div>
    
    <!-- Mobile menu button -->
    <button class="md:hidden text-gray-300 hover:text-white p-2 rounded-lg transition-colors hover:bg-custom-dark2" id="mobile-menu-button">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Navigation -->
    <nav class="w-full md:w-auto md:flex flex-1 justify-between items-center space-x-4 md:space-x-6 text-gray-300 hidden" id="mobile-menu">
        <div class="flex flex-col md:flex-row w-full justify-between items-center">
            <div class="md:w-1/4">
                <a href="#" class="flex items-center space-x-2 hover:text-white py-2 md:py-0 transition-all duration-200 hover:scale-105">
                    <svg class="w-6 h-6 text-gray-300 stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <line x1="3" y1="6" x2="21" y2="6" stroke-linecap="round"/>
                        <line x1="3" y1="12" x2="21" y2="12" stroke-linecap="round"/>
                        <line x1="3" y1="18" x2="21" y2="18" stroke-linecap="round"/>
                    </svg>
                    <span class="text-gray-300 text-lg font-medium">Categorías</span>
                </a>
            </div>
            
            <div class="relative w-full md:w-2/5 mx-auto my-2 md:my-0">
                <input type="text" 
                       placeholder="Buscar productos..." 
                       class="bg-custom-dark2/80 text-white p-3 rounded-xl pl-11 w-full focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all duration-300 placeholder-gray-400" 
                       id="buscarProducto" 
                       name="nombre" 
                       autocomplete="off">
                <img src="{{ asset('icons/web/search.svg') }}" 
                     alt="Buscar" 
                     class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 opacity-50">
                     
                <div id="resultadosBusqueda" 
                     class="absolute left-0 right-0 w-full bg-custom-dark2/95 backdrop-blur-md rounded-b-xl shadow-xl border border-gray-700/50 border-t-0 overflow-hidden z-50 hidden max-h-[70vh] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-transparent top-full mt-1">
                </div>
            </div>

            <!-- Right side with cart and account -->
            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-8 md:w-1/4 justify-end" aria-label="Ver el carrito">
                <a href="{{ route('carrito.index') }}" class="flex items-center space-x-3 hover:text-white group transition-all duration-200 hover:scale-105 p-2">
                    <svg class="w-6 h-6 text-gray-300 fill-none stroke-current stroke-2 group-hover:text-primary transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M3 3h2l3 10h10l3-7H6" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="20" r="1"/>
                        <circle cx="18" cy="20" r="1"/>
                    </svg>
                    <span class="text-lg font-medium">Mi cesta</span>
                </a>

                @if(Auth::check())
                    <a id="miCuenta" href="{{ route('mostrarEstadisticas') }}" class="flex items-center space-x-3 pr-6 hover:text-white group transition-all duration-200 hover:scale-105 p-2">
                        <svg class="w-6 h-6 text-gray-300 fill-current group-hover:text-primary transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7z"/>
                        </svg>
                        <span class="font-medium">Mi cuenta</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center space-x-3 hover:text-white group transition-all duration-200 hover:scale-105 p-2">
                        <svg class="w-6 h-6 text-gray-300 fill-current group-hover:text-primary transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7z"/>
                        </svg>
                        <span class="font-medium">Login</span>
                    </a>
                @endif
            </div>
        </div>
    </nav>
</header>

<script type="module" src="{{ asset('js/header/header.js') }}"></script>
<script type="module" src="{{ asset('js/header/buscador.js') }}"></script>
<script type="module" src="{{ asset('js/header/verCarrito.js') }}"></script>
<header class="bg-custom-dark1 border-b border-gray-800 py-4">
    <div class="container mx-auto flex items-center justify-between px-4">
        
    <div class="text-2xl font-bold text-primary flex items-center space-x-2">
        <a href="{{ route('main') }}">
            <img src="{{ asset('logos/logo_misma_linea.webp') }}" alt="PC Markt Logo" class="h-8 w-auto">
        </a>
    </div>



        <nav class="flex items-center space-x-6 text-gray-300">
            
            <a href="#" class="flex items-center space-x-2 hover:text-white cursor-pointer">
                <img src="{{ asset('icons/web/menu.svg') }}" alt="Categorías" class="w-6 h-6">
                <span class="pl-1">Categorías</span>
            </a>

            <div class="relative">
                <input type="text" placeholder="Buscar..." class="bg-gray-800 text-white px-4 py-2 rounded-lg pl-10 focus:outline-none">
            </div>

            <a href="{{ route('mostrarPanelAdmin') }}" class="flex items-center space-x-2 hover:text-white">
                <img src="{{ asset('icons/web/user.svg') }}" alt="Mi cuenta" class="w-6 h-6">
                <span>Mi cuenta</span>
            </a>

            <a href="#" class="flex items-center space-x-2 hover:text-white">
                <img src="{{ asset('icons/web/shopping-cart.svg') }}" alt="Mi cesta" class="w-6 h-6">
                <span>Mi cesta</span>
            </a>
            
        </nav>
    </div>
</header>

<aside class="h-screen bg-custom-dark1 p-4 flex flex-col justify-between">
    <div class="flex-grow overflow-y-auto pt-4">
        <div class="space-y-2 gap-6 flex flex-col pl-4">
            <div class="flex items-center space-x-2 pb-4 cursor-pointer text-white font-bold admin-nav-item" id="dashboard">
                <img src="{{ asset('logos/logo.webp') }}" alt="Logo" class="w-12 h-12">
                <span class="text-2xl">Dashboard</span>
            </div>
            <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="estats">
                <img src="{{ asset('icons/web/estats.svg') }}" alt="Estadísticas" class="w-8 h-8">
                <span class="text-2xl">Estadísticas</span>
            </div>
            <a href="{{ route('mostrarEstadisticasCategoria') }}">
                <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="categorias">
                    <img src="{{ asset('icons/web/category.svg') }}" alt="Categorías" class="w-8 h-8">
                    <span class="text-2xl">Categorías</span>
                </div>
            </a>
            <a href="{{ route('mostrarEstadisticasProducto') }}">
                <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="productos">
                    <img src="{{ asset('icons/web/packages.svg') }}" alt="Productos" class="w-8 h-8">
                    <span class="text-2xl">Productos</span>
                </div>
            </a>
            <a href="{{ route('mostrarEstadisticasUsuario') }}">
                <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="usuarios">
                    <img src="{{ asset('icons/web/users.svg') }}" alt="Usuarios" class="w-8 h-8">
                    <span class="text-2xl">Usuarios</span>
                </div>
            </a>
            <a href="{{ route('mostrarEstadisticasCompra') }}">
                <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="pedidos">
                    <img src="{{ asset('icons/web/truck.svg') }}" alt="Pedidos" class="w-8 h-8">
                    <span class="text-2xl">Compras</span>
                </div>
            </a>
            <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="configuracion">
                <img src="{{ asset('icons/web/settings.svg') }}" alt="Configuración" class="w-8 h-8">
                <span class="text-2xl">Configuración</span>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center space-x-2 cursor-pointer text-gray-300 hover:text-white mb-4 admin-nav-item" id="logout">
        <img src="{{ asset('icons/web/logout.svg') }}" alt="Logout" class="w-6 h-6">
        <span class="text-xl">Salir</span>
    </div>
</aside>
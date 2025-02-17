<aside class="bg-custom-dark1 h-full w-64 pl-4 pr-4">
    <div class="flex-grow overflow-y-auto">
        <ul class="space-y-2">
            <li class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="estats">
                <img src="{{ asset('icons/web/estats.svg') }}" alt="Estadísticas" class="w-6 h-6">
                <span>Estadísticas</span>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="categorias">
            <img src="{{ asset('icons/web/category.svg') }}" alt="Categorías" class="w-6 h-6">
                <span>Categorías</span>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="productos">
                <img src="{{ asset('icons/web/packages.svg') }}" alt="Productos" class="w-6 h-6">
                <span>Productos</span>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="usuarios">
                <img src="{{ asset('icons/web/users.svg') }}" alt="Usuarios" class="w-6 h-6">
                <span>Usuarios</span>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="pedidos">
                <img src="{{ asset('icons/web/truck.svg') }}" alt="Pedidos" class="w-6 h-6">
                <span>Pedidos</span>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="configuracion">
                <img src="{{ asset('icons/web/settings.svg') }}" alt="Configuración" class="w-6 h-6">
                <span>Configuración</span>
            </li>
        </ul>
    </div>
    <div class="flex items-center space-x-2 cursor-pointer text-gray-300 hover:text-white admin-nav-item" id="logout">
        <img src="{{ asset('icons/web/logout.svg') }}" alt="Logout" class="w-6 h-6">
        <span>Salir</span>
    </div>
</aside>
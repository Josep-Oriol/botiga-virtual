@extends('layouts.app')

@section('title', 'PC Markt')

@section('content')
    <section class="relative bg-gradient-to-r from-custom-dark3 to-custom-dark2 py-12 md:py-20 bg-cover bg-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 container mx-auto px-4 md:px-6 lg:px-20 text-center md:text-left">  
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 md:mb-6">Construye el ordenador de tus sueños</h2>
            <a href="" class="inline-block bg-primary px-6 md:px-8 py-2 md:py-3 rounded-lg font-semibold hover:bg-blue-600">Montar PC</a>
        </div>
    </section>

    <section class="py-6 md:py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-xl md:text-2xl font-bold text-white text-center mb-6 md:mb-8">Categorías destacadas</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 justify-center" id="categoriasDestacadas">
                @foreach ($categoriasDestacadas as $categoria)
                    <div class="categoria-destacada flex flex-col items-center justify-center px-3 md:px-6 py-3 md:py-4 bg-custom-dark3 rounded-lg hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <img src="{{ asset('storage/categorias/' . $categoria->imagen_categoria) }}" alt="{{ $categoria->nombre_categoria }}" class="w-full max-w-[120px]">
                        <h3 class="text-base md:text-lg font-bold text-primary mt-2">{{ $categoria->nombre_categoria }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-6 md:py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6 md:mb-8">
                <h2 class="text-xl md:text-2xl font-bold text-white">Productos Destacados</h2>
                <a href="{{ route('verProductos') }}" class="text-primary hover:text-pink-400">Ver todos</a>
            </div>
            <div id="productosDestacados" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                @foreach ($productosDestacados as $producto)
                    <div class="producto-destacado flex flex-col justify-between gap-3 md:gap-4 px-4 md:px-6 py-4 bg-custom-dark3 rounded-lg hover:-translate-y-2 transition-all duration-300 cursor-pointer h-auto md:h-[300px]">
                        <img src="{{ asset('storage/productos/' . $producto->imagen_producto) }}" alt="{{ $producto->nombre_producto }}" class="w-full object-contain max-h-[150px]">
                        <div class="flex flex-col gap-2">
                            <h3 class="text-base md:text-lg font-bold text-white">{{ $producto->nombre_producto }}</h3>
                            <p class="text-primary">{{ $producto->precio_producto }}€</p>
                            <a href="{{ route('verProducto', $producto->id) }}" class="bg-primary px-4 md:px-8 py-2 md:py-3 rounded-lg font-semibold hover:bg-blue-600 text-center">Ver producto</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-10 md:py-16 bg-custom-dark3">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 text-center">
                <div class="mb-6 md:mb-0">
                    <img src="{{ asset('icons/web/main/truck-delivery.svg') }}" class="w-10 h-10 md:w-12 md:h-12 mx-auto mb-3 md:mb-4">
                    <p class="font-semibold text-white">Envío Gratis</p>
                    <p class="text-gray-400 text-sm md:text-base">En pedidos superiores a 999€</p>
                </div>
                <div class="mb-6 md:mb-0">
                    <img src="{{ asset('icons/web/main/headset.svg') }}" class="w-10 h-10 md:w-12 md:h-12 mx-auto mb-3 md:mb-4">
                    <p class="font-semibold text-white">24/7 Support</p>
                    <p class="text-gray-400 text-sm md:text-base">Expertos en asistencia</p>
                </div>
                <div>
                    <img src="{{ asset('icons/web/main/shield-half.svg') }}" class="w-10 h-10 md:w-12 md:h-12 mx-auto mb-3 md:mb-4">
                    <p class="font-semibold text-white">Pago Seguro</p>
                    <p class="text-gray-400 text-sm md:text-base">Transacciones 100% seguras</p>
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="{{ asset('js/main.js') }}"></script>
@endsection
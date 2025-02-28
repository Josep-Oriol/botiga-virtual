@extends('layouts.app')

@section('title', 'PC Markt')

@section('content')

    <section class="relative bg-gradient-to-r from-custom-dark3 to-custom-dark2 py-20 bg-cover bg-center">
            <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 container mx-auto px-6 lg:px-20 text-left">  
            <h2 class="text-4xl font-bold text-white mb-6">Construye el ordenador de tus sueños</h2>
            <a href="" class="bg-primary px-8 py-3 rounded-lg font-semibold hover:bg-blue-600">Montar PC</a>
        </div>
    </section>


    <section class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-white text-center mb-8">Categorías destacadas</h2>
            <div class="flex justify-center gap-6 items-center" id="categoriasDestacadas">
                @foreach ($categoriasDestacadas as $categoria)
                    <div class="categoria-destacada flex flex-col items-center justify-center px-6 py-4 bg-custom-dark3 rounded-lg hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <img src="{{ asset('storage/categorias/' . $categoria->imagen_categoria) }}" alt="{{ $categoria->nombre_categoria }}">
                        <h3 class="text-lg font-bold text-primary">{{ $categoria->nombre_categoria }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-white">Productos Destacados</h2>
                <a href="{{ route('verProductos') }}" class="text-primary hover:text-pink-400">Ver todos</a>
            </div>
            <div id="productosDestacados" class="flex justify-center gap-4">
                @foreach ($productosDestacados as $producto)
                    <div class="producto-destacado flex flex-col justify-between gap-4 px-6 py-4 bg-custom-dark3 rounded-lg hover:-translate-y-2 transition-all duration-300 cursor-pointer w-[300px] h-[300px]">
                        <img src="{{ asset('storage/productos/' . $producto->imagen_producto) }}" alt="{{ $producto->nombre_producto }}">
                        <div class="flex flex-col gap-2">
                            <h3 class="text-lg font-bold text-white">{{ $producto->nombre_producto }}</h3>
                            <p class="text-primary">{{ $producto->precio_producto }}€</p>
                            <a href="{{ route('verProducto', $producto->id) }}" class="bg-primary px-8 py-3 rounded-lg font-semibold hover:bg-blue-600 text-center">Ver producto</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-custom-dark3">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 gap-8 text-center">
                <div>
                    <img src="{{ asset('icons/web/main/truck-delivery.svg') }}" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold text-white">Envío Gratis</p>
                    <p class="text-gray-400">En pedidos superiores a 999€</p>
                </div>
                <div>
                    <img src="{{ asset('icons/web/main/headset.svg') }}" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold text-white">24/7 Support</p>
                    <p class="text-gray-400">Expertos en asistencia</p>
                </div>
                <div>
                    <img src="{{ asset('icons/web/main/shield-half.svg') }}" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold text-white">Pago Seguro</p>
                    <p class="text-gray-400">Transacciones 100% seguras</p>
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="{{ asset('js/main.js') }}"></script>
@endsection

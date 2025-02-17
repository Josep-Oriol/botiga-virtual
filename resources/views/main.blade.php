@extends('app')

@section('title', 'PC Markt')

@section('content')

    <section class="bg-gradient-to-r from-custom-dark3 to-custom-dark2 py-20 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-white mb-6">Construye el ordenador de tus sueños</h2>
            <a href="#" class="bg-primary px-8 py-3 rounded-lg font-semibold hover:bg-blue-600">Montar PC</a>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-white text-center mb-8">Categorías</h2>
            <div class="grid grid-cols-4 gap-6"></div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-white">Productos Destacados</h2>
                <a href="#" class="text-primary hover:text-blue-400">Ver más</a>
            </div>
            <div class="grid grid-cols-4 gap-6"></div>
        </div>
    </section>

    <section class="py-16 bg-custom-dark3">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 gap-8 text-center">
                <div>
                    <img src="{{ asset('icons/shipping.png') }}" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold text-white">Envío Gratis</p>
                    <p class="text-gray-400">En pedidos superiores a 999€</p>
                </div>
                <div>
                    <img src="{{ asset('icons/support.png') }}" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold text-white">24/7 Support</p>
                    <p class="text-gray-400">Expertos en asistencia</p>
                </div>
                <div>
                    <img src="{{ asset('icons/payment.png') }}" class="w-12 h-12 mx-auto mb-4">
                    <p class="font-semibold text-white">Pago Seguro</p>
                    <p class="text-gray-400">Transacciones 100% seguras</p>
                </div>
            </div>
        </div>
    </section>

@endsection

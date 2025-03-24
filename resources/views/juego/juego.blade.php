@extends('layouts.app')

@section('title', 'Juego')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Armar el Ordenador</h1>
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Sección de Ajustes -->
        <div class="w-full md:w-1/3 bg-custom-dark3 rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Ajustes del Juego</h2>
            <div class="flex flex-col gap-4">
                <p>Tiempo restante: <span id="tiempo">60</span> segundos</p>
            </div>
        </div>

        <!-- Sección del Juego -->
        <div class="w-full md:w-2/3 bg-custom-dark3 rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Juego</h2>
            <!-- Imagen del Ordenador -->
            <div id="ordenador" class="w-full h-64 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
                <img src="{{ asset('images/ordenador.png') }}" alt="Ordenador" class="w-full h-full object-contain">
            </div>

            <!-- Componentes para Arrastrar -->
            <div class="flex gap-4">
                <img src="{{ asset('images/cpu.png') }}" alt="CPU" class="w-16 h-16 cursor-move" draggable="true">
                <img src="{{ asset('images/gpu.png') }}" alt="GPU" class="w-16 h-16 cursor-move" draggable="true">
                <img src="{{ asset('images/ram.png') }}" alt="RAM" class="w-16 h-16 cursor-move" draggable="true">
                <img src="{{ asset('images/disco-duro.png') }}" alt="Disco Duro" class="w-16 h-16 cursor-move" draggable="true">
            </div>

            <!-- Mensajes de Feedback -->
            <p id="mensaje" class="mt-4 text-green-500"></p>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('js/client/juego/juego.js') }}"></script>
@endsection
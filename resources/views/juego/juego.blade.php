@extends('layouts.app')

@section('title', 'Juego')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Identificar las piezas</h1>
    <div class="flex flex-col md:flex-row gap-4">
        <div class="w-full md:w-1/3 bg-custom-dark3 rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Ajustes del Juego</h2>
            <div class="flex flex-col">
                <div class="flex flex-col gap-2">
                    <button id="reiniciar" class="bg-red-500 hover:bg-red-500/80 text-white font-bold py-2 px-4 rounded mt-4">Reiniciar</button>
                    <button id="enviar" class="bg-primary hover:bg-primary/80 text-white font-bold py-2 px-4 rounded mt-4">Enviar Resultado</button>
                </div>
            </div>
        </div>

        <div class="w-full md:w-2/3 bg-custom-dark3 rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Juego</h2>

            <div id="div-drop-piezas" class="w-full h-64 bg-gray-700 rounded-lg flex items-center justify-around mb-4">
                <div class="dropzone w-20 h-20 border-2 border-dashed border-white rounded flex justify-center items-center" id="drop-cpu">CPU</div>
                <div class="dropzone w-20 h-20 border-2 border-dashed border-white rounded flex justify-center items-center" id="drop-gpu">GPU</div>
                <div class="dropzone w-20 h-20 border-2 border-dashed border-white rounded flex justify-center items-center" id="drop-ram">RAM</div>
            </div>

            <div class="flex gap-4 mt-4 contenedor-piezas">
                <img src="{{ asset('storage/juego/cpu.png') }}" alt="CPU" class="pieza w-16 h-16 cursor-move" id="pieza-cpu" data-match="drop-cpu" draggable="true">
                <img src="{{ asset('storage/juego/gpu.png') }}" alt="GPU" class="pieza w-16 h-16 cursor-move" id="pieza-gpu" data-match="drop-gpu" draggable="true">
                <img src="{{ asset('storage/juego/ram.png') }}" alt="RAM" class="pieza w-16 h-16 cursor-move" id="pieza-ram" data-match="drop-ram" draggable="true">
            </div>

            <p id="mensaje" class="mt-4 text-green-500"></p>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('js/client/juego/juego.js') }}"></script>
@endsection
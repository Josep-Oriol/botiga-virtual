@extends('layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row justify-between gap-4 p-4 md:p-8">
        <div class="w-full lg:w-2/3 flex flex-col gap-4">
            <h1 class="text-xl md:text-2xl font-bold">Carrito</h1>
            <hr>
            <div id="carritoProductos" class="flex flex-col gap-4"></div>
        </div>

        <div class="w-full lg:w-1/3 flex flex-col gap-4 mt-6 lg:mt-0">
            <h1 class="text-xl md:text-2xl font-bold">Contenido del carrito <span id="carritoTotal"></span></h1>
            <hr>
            <div id="carritoTotal" class="flex flex-col gap-4">
                <p class="text-gray-400 font-bold text-sm md:text-base">
                    Total Productos: <span class="text-primary" id="totalProductos"></span>
                </p>
                <p class="text-gray-400 font-bold text-sm md:text-base">
                    Total Precio: <span class="text-primary" id="totalPrecio"></span>
                </p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button class="flex-1 bg-custom-dark3 text-primary p-2 md:p-3 rounded-md hover:bg-custom-dark3/80 transition-all duration-300 text-sm md:text-base" id="vaciar-carrito">
                        Vaciar carrito
                    </button>
                    <button class="flex-1 bg-primary text-custom-dark3 p-2 md:p-3 rounded-md hover:bg-primary/80 transition-all duration-300 text-sm md:text-base" id="comprar-carrito">
                        Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

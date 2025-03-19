@extends('layouts.app')

@section('title', 'Mi Perfil - ' . Auth::user()->nombre_usuario)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-8 text-center md:text-left">Mi Perfil - {{ Auth::user()->nombre_usuario }}</h1>
    <div class="bg-custom-dark3 p-6 rounded-xl shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex flex-col gap-2">
                <label for="nombre" class="font-medium">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ Auth::user()->nombre_usuario }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2">
                <label for="email" class="font-medium">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2">
                <label for="direccion" class="font-medium">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ Auth::user()->address }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2">
                <label for="telefono" class="font-medium">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" value="{{ Auth::user()->phone }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2 col-span-full">
                <label for="codigoPostal" class="font-medium">Código Postal</label>
                <input type="text" id="codigoPostal" name="codigoPostal" value="{{ Auth::user()->postalCode }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2 col-span-full">
                <label for="ciudad" class="font-medium">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" value="{{ Auth::user()->city }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2 col-span-full">
                <label for="provincia" class="font-medium">Provincia</label>
                <input type="text" id="provincia" name="provincia" value="{{ Auth::user()->province }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
            <div class="flex flex-col gap-2 col-span-full">
                <label for="pais" class="font-medium">País</label>
                <input type="text" id="pais" name="pais" value="{{ Auth::user()->country }}" readonly class="bg-custom-dark2 rounded-md p-2">
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-custom-dark2 rounded-lg shadow-lg overflow-hidden border border-custom-dark3">
        <div class="bg-custom-dark1 px-6 py-4 border-b border-custom-dark3">
            <h2 class="text-xl font-semibold text-white">Compra Completada</h2>
        </div>
        
        <div class="p-8 text-center">
            <div class="mb-6">
                <svg class="mx-auto h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h3 class="text-2xl font-bold text-white mb-4">¡Gracias por tu compra!</h3>
            
            <p class="text-primary-light mb-8">
                Tu pedido ha sido procesado correctamente. Recibirás un correo electrónico con los detalles de tu compra.
            </p>
            
            <div class="mt-8">
                <a href="{{ route('main') }}" 
                   class="inline-flex justify-center items-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Volver a la página principal
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-white mb-6">Formulario de Pago</h1>
        
        <div class="bg-custom-dark2 rounded-lg shadow-lg overflow-hidden border border-custom-dark3">
            <div class="bg-custom-dark1 px-6 py-4 border-b border-custom-dark3">
                <h2 class="text-xl font-semibold text-white">Datos de Pago</h2>
            </div>
            
            <div class="p-6">
                <form method="POST" action="{{ route('processarCompra') }}" id="payment-form">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Información del titular -->
                        <div>
                            <h3 class="text-lg font-medium text-white mb-4">Información del titular</h3>
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="cardholder_name" class="block text-sm font-medium text-primary-light">
                                        Nombre completo
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="cardholder_name" name="cardholder_name" 
                                            class="block w-full rounded-md p-2 bg-custom-dark3 border-custom-dark1 text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Información de la tarjeta -->
                        <div>
                            <h3 class="text-lg font-medium text-white mb-4">Información de la tarjeta</h3>
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="sm:col-span-6">
                                    <label for="card_number" class="block text-sm font-medium text-primary-light">
                                        Número de tarjeta
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="card_number" name="card_number" 
                                            placeholder="XXXX XXXX XXXX XXXX"
                                            class="block w-full rounded-md p-2 bg-custom-dark3 border-custom-dark1 text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                            required>
                                    </div>
                                </div>
                                
                                <div class="sm:col-span-3">
                                    <label for="expiry_date" class="block text-sm font-medium text-primary-light">
                                        Fecha de expiración
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="expiry_date" name="expiry_date" 
                                            placeholder="MM/AA"
                                            class="block w-full rounded-md p-2 bg-custom-dark3 border-custom-dark1 text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                            required>
                                    </div>
                                </div>
                                
                                <div class="sm:col-span-3">
                                    <label for="cvv" class="block text-sm font-medium text-primary-light">
                                        Código de seguridad (CVV)
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="cvv" name="cvv" 
                                            placeholder="123"
                                            class="block w-full rounded-md p-2 bg-custom-dark3 border-custom-dark1 text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Resumen de compra -->
                        <div class="border-t border-custom-dark3 pt-6">
                            <h3 class="text-lg font-medium text-white mb-4">Resumen de compra</h3>
                            <div class="flex justify-between text-primary-light mb-2">
                                <span>Total Productos:</span>
                                <span id="total-productos">0</span>
                            </div>
                            <div class="flex justify-between text-white font-bold text-lg mb-4">
                                <span>Total Precio:</span>
                                <span id="total-precio">0€</span>
                            </div>
                            
                            <!-- Sección de cupones -->
                            <div class="mt-4 border-t border-custom-dark3 pt-4">
                                <h4 class="text-md font-medium text-white mb-3">¿Tienes un cupón de descuento?</h4>
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <input type="text" id="coupon_code" name="coupon_code" 
                                        placeholder="Introduce tu código"
                                        class="flex-grow rounded-md p-2 bg-custom-dark3 border-custom-dark1 text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                    <button type="button" id="apply-coupon" 
                                        class="inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                        Aplicar
                                    </button>
                                </div>
                                <div id="coupon-message" class="mt-2 text-sm hidden"></div>
                            </div>
                        </div>
                        
                        <!-- Botones de acción -->
                        <div class="pt-4 flex flex-col sm:flex-row justify-between gap-4">
                            <a href="{{ route('carrito.index') }}" 
                                class="inline-flex items-center justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-custom-dark3 hover:bg-custom-dark1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-dark3 w-full sm:w-auto">
                                Volver al carrito
                            </a>
                            <button type="submit" 
                                class="inline-flex justify-center py-3 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary w-full sm:w-auto">
                                Procesar pago
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="module" src="{{ asset('js/client/validarCompra.js')}}"></script>
@endsection
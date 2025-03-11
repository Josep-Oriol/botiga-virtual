@extends('layouts.void')

@section('title', 'Regístrate')

@section('content')
<div class="flex justify-center items-center h-screen flex-col">
    <div class="mb-8 text-center">
      <a href="{{ route('main') }}">
        <img src="{{asset('logos/logo_grande.webp')}}" alt="">
      </a>
    </div>
    
    <div class="bg-custom-dark3 rounded-lg w-full max-w-xl p-6 shadow-lg">
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm mb-2">Nombre</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="nombre" name="nombre" type="text" required placeholder="Introduce tu nombre*" 
                               class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
                    </div>
                </div>
                
                <!-- Apellidos -->
                <div class="mb-4">
                    <label for="apellidos" class="block text-white text-sm mb-2">Apellidos</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="apellidos" name="apellidos" type="text" required placeholder="Introduce tus apellidos*" 
                               class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <!-- Usuario -->
                <div class="mb-4">
                    <label for="usuario" class="block text-white text-sm mb-2">Usuario</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="usuario" name="usuario" type="text" required placeholder="Introduce tu usuario*" 
                               class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
                    </div>
                </div>
                
                <!-- E-Mail -->
                <div class="mb-4">
                    <label for="email" class="block text-white text-sm mb-2">E-Mail</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" required placeholder="Introduce tu e-mail*" 
                               class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <!-- Contraseña -->
                <div class="mb-4">
                    <label for="password" class="block text-white text-sm mb-2">Contraseña</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" required placeholder="Introduce tu contraseña*" 
                               class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
                    </div>
                </div>
                
                <!-- Repetir contraseña -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-white text-sm mb-2">Repetir contraseña</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Repite tu contraseña*" 
                               class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-center mb-6 mt-2">
                <input id="terms" name="terms" type="checkbox" required 
                      class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary">
                <label for="terms" class="ml-2 block text-sm text-white">
                    He leído y acepto la <a href="#" class="text-secondary hover:underline">política de privacidad</a>
                </label>
            </div>

            
            <button type="submit" 
                    class="w-full bg-primary hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                Crear cuenta
            </button>
        </form>
        
        <div class="text-center mt-6">
            <p class="text-white text-sm">
                ¿Ya tienes una cuenta? 
                <a href="{{ url('/login') }}" class="text-secondary font-medium hover:underline">
                    Iniciar sesión
                </a>
            </p>
        </div>
    </div>
</div>    


@endsection
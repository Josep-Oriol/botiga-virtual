@extends('layouts.void')

@section('title', 'Login')

@section('content')

<div class="flex justify-center items-center h-screen flex-col">
    <a href="{{ route('main') }}">
        <img src="{{asset('logos/logo_grande.webp')}}" alt="">
    </a>
  <div class="bg-custom-dark3 rounded-lg w-full max-w-md p-6 shadow-lg">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-white text-sm mb-2">Usuario</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input id="email" name="email type="text" required placeholder="Introduce tu email" autocomplete="off"
                        class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="password" class="block text-white text-sm mb-2">Contraseña</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input id="password" name="password" type="password" required placeholder="Introduce tu contraseña" 
                        class="bg-custom-dark3 border border-gray-700 text-white rounded-md block w-full pl-10 pr-3 py-2 focus:outline-none focus:border-primary">
            </div>
        </div>
        
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" 
                        class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary">
                <label for="remember" class="ml-2 block text-sm text-white">
                    Recuérdame
                </label>
            </div>
            <div>
                <a href="#" class="text-secondary text-sm hover:underline">
                    ¿Has olvidado tu contraseña?
                </a>
            </div>
        </div>
        
        <button type="submit" 
                class="w-full bg-primary hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
            Iniciar Sesión
        </button>
    </form>
      
    <div class="text-center mt-6">
        <p class="text-white text-sm">
            ¿No tienes una cuenta? 
            <a href="{{ route('showRegister') }}" class="text-secondary font-medium hover:underline">
                Regístrate ahora
            </a>
        </p>
    </div>
  </div>
</div>

@endsection
@extends('layouts.app')

@section('title', 'Vista de producto')

@section('content')

<div class="max-w-6xl mx-auto p-4">
    <!-- Main content -->
    <div class="flex flex-col lg:flex-row gap-6">
      <!-- Left side - Images -->
      <div class="lg:w-1/2">
        <!-- Main image -->
        <div class="bg-gray-800 rounded-lg mb-3 p-2">
          <img src="/api/placeholder/400/300" alt="NVIDIA RTX 4090" class="w-full h-auto object-cover rounded">
        </div>
        <!-- Thumbnail images -->
        <div class="grid grid-cols-3 gap-3">
          <div class="bg-gray-800 rounded-lg p-1">
            <img src="/api/placeholder/120/80" alt="Vista 1" class="w-full h-auto object-cover rounded">
          </div>
          <div class="bg-gray-800 rounded-lg p-1">
            <img src="/api/placeholder/120/80" alt="Vista 2" class="w-full h-auto object-cover rounded">
          </div>
          <div class="bg-gray-800 rounded-lg p-1">
            <img src="/api/placeholder/120/80" alt="Vista 3" class="w-full h-auto object-cover rounded">
          </div>
        </div>

        <!-- Specs bullet points -->
        <div class="mt-5 text-sm">
          <ul class="space-y-2">
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>Arquitectura: Ada Lovelace</span>
            </li>
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>Memoria: 24GB GDDR6X</span>
            </li>
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>Núcleos CUDA: 16384</span>
            </li>
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>Frecuencia boost: 2875 MHz</span>
            </li>
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>Interfaz de memoria: 384-bit</span>
            </li>
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>Soporte DLSS 3.0</span>
            </li>
            <li class="flex items-start">
              <span class="text-blue-400 mr-2">•</span>
              <span>3 puertos DisplayPort, 1 HDMI 2.1 (HDCP 2.3)</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Right side - Product info -->
      <div class="lg:w-1/2">
        <h1 class="text-xl font-bold mb-1">NVIDIA RTX 4090 TechVault Edition</h1>
        <p class="text-gray-400 text-sm mb-4">Tarjeta Gráfica de Alto Rendimiento</p>

        <!-- Price section -->
        <div class="mt-2 mb-4">
          <span class="text-3xl font-bold">$1,999</span>
        </div>

        <!-- Features with icons -->
        <div class="mb-4 space-y-2">
          <div class="flex items-center text-sm">
            <i class="fa-solid fa-check text-blue-500 mr-2"></i>
            <span>Stock Disponible Ahora</span>
          </div>
          <div class="flex items-center text-sm">
            <i class="fa-solid fa-truck-fast text-blue-500 mr-2"></i>
            <span>Envío Express 24/48h</span>
          </div>
          <div class="flex items-center text-sm">
            <i class="fa-solid fa-shield text-blue-500 mr-2"></i>
            <span>Garantía oficial 2 años</span>
          </div>
        </div>

        <!-- Add to cart button -->
        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded text-center font-medium mb-2">
          Añadir al carrito
        </button>
        
        <div class="text-center mb-6">
          <a href="#" class="text-blue-400 text-sm">Leer más</a>
        </div>

        <!-- Info cards -->
        <div class="grid grid-cols-2 gap-3 mb-6">
          <div class="bg-gray-800 rounded-lg p-3">
            <div class="flex items-center mb-1">
              <i class="fa-solid fa-star text-pink-500 mr-2"></i>
              <span class="font-semibold">Reseñas</span>
            </div>
            <p class="text-xs text-gray-400">4.9 (86 reseñas)</p>
          </div>
          <div class="bg-gray-800 rounded-lg p-3">
            <div class="flex items-center mb-1">
              <i class="fa-solid fa-shield-halved text-pink-500 mr-2"></i>
              <span class="font-semibold">Pago Seguro</span>
            </div>
            <p class="text-xs text-gray-400">Múltiples métodos</p>
          </div>
        </div>

        <!-- Compatibility section -->
        <h3 class="font-bold mb-2 text-sm">Build ID: Compatible</h3>
        <ul class="text-sm space-y-2">
          <li class="flex items-start">
            <span class="text-blue-400 mr-2">•</span>
            <span>PCIe: Compatible con PCIe 4.0</span>
          </li>
          <li class="flex items-start">
            <span class="text-blue-400 mr-2">•</span>
            <span>Alimentación: 3×8-pin o adaptador 16-pin incluido</span>
          </li>
          <li class="flex items-start">
            <span class="text-blue-400 mr-2">•</span>
            <span>Compatibilidad: PCIe 3.0</span>
          </li>
          <li class="flex items-start">
            <span class="text-blue-400 mr-2">•</span>
            <span>Refrigeración: Ventiladores triple (vapor chamber)</span>
          </li>
          <li class="flex items-start">
            <span class="text-blue-400 mr-2">•</span>
            <span>Dimensiones: Long. 340 mm (aproximado)</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Links section -->
    <div class="flex mt-8 border-t border-gray-700 pt-6">
      <div class="w-1/4">
        <img src="/api/placeholder/120/40" alt="SPG Logo" class="h-8">
      </div>
      <div class="w-1/4">
        <h4 class="font-medium mb-3">Links</h4>
        <ul class="text-sm space-y-2 text-gray-400">
          <li>Sobre Nosotros</li>
          <li>Contacto</li>
          <li>Blog</li>
        </ul>
      </div>
      <div class="w-1/2">
        <h4 class="font-medium mb-3">Soporte</h4>
        <ul class="text-sm space-y-2 text-gray-400">
          <li>Información de envío</li>
          <li>Devoluciones</li>
          <li>FAQ</li>
          <li>Métodos de pago</li>
        </ul>
      </div>
    </div>
  @endsection
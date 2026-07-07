@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-gray-900 min-h-screen text-white">
     <!--Mensaje al guardar-->
     @if(session('success'))
    <div id="success-message" 
         class="flex items-center bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg mb-4 animate-bounce">
        <!-- Ícono -->
        <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" 
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
        </svg>
        <!-- Texto -->
        <span class="font-semibold">{{ session('success') }}</span>
    </div>

    <script>
        // Desaparece con efecto fade después de 3 segundos
        setTimeout(function() {
            let msg = document.getElementById('success-message');
            if (msg) {
                msg.style.transition = "opacity 1s ease";
                msg.style.opacity = "0";
                setTimeout(() => msg.style.display = "none", 1000);
            }
        }, 2000);
    </script>
@endif

    
    <!-- Encabezado -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Tipos de Habitación</h1>
            <p class="text-sm text-gray-400">{{ $tipos->count() }} categorías definidas</p>
        </div>
        <a href="{{ route('tipos.create') }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg shadow">
            + Nuevo tipo
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($tipos as $tipo)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $tipo->id_tipo }}</td>
                    <td class="px-6 py-4 text-sm">{{ $tipo->nombre_tipo }}</td>
                    <td class="px-6 py-4 text-sm">{{ $tipo->descripcion }}</td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('tipos.edit', $tipo->id_tipo) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm mr-2">
                           Editar
                        </a>
                        <form action="{{ route('tipos.destroy', $tipo->id_tipo) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-400">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

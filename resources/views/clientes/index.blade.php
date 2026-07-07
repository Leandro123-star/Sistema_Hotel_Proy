@extends('layouts.app')

@section('content')
    <h1 class="text-yellow-400 text-3xl font-bold mb-4">Clientes</h1>
    <p class="mb-4">{{ count($clientes) }} huéspedes registrados</p>
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



    <a href="{{ route('clientes.create') }}" 
       class="bg-yellow-400 text-gray-900 px-4 py-2 rounded font-semibold hover:bg-yellow-300">
       + Nuevo cliente
    </a>

   <form action="{{ route('clientes.index') }}" method="GET" class="mt-6">
    <input type="text" name="search" placeholder="Buscar por nombre o CI..." 
           value="{{ request('search') }}"
           class="w-full px-3 py-2 rounded bg-gray-800 text-gray-100 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400">
</form>


    <table class="w-full mt-6 border-collapse">
        <thead>
            <tr class="bg-gray-700 text-yellow-400">
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">NOMBRE</th>
                <th class="px-4 py-2 text-left">APELLIDO</th>
                <th class="px-4 py-2 text-left">CI</th>
                <th class="px-4 py-2 text-left">TELÉFONO</th>
                <th class="px-4 py-2 text-left">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr class="border-b border-gray-700 hover:bg-gray-800">
                <td class="px-4 py-2">{{ $cliente->id_cliente }}</td>
                <td class="px-4 py-2">{{ $cliente->nombre }}</td>
                <td class="px-4 py-2">{{ $cliente->apellido }}</td>
                <td class="px-4 py-2">{{ $cliente->ci }}</td>
                <td class="px-4 py-2">{{ $cliente->telefono }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" 
                       class="bg-blue-500 px-3 py-1 rounded text-white hover:bg-blue-400">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-400">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

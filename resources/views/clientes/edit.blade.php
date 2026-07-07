@extends('layouts.app')

@section('content')
<div class="bg-gray-800 p-6 rounded shadow-md max-w-lg mx-auto">
    <h2 class="text-yellow-400 text-2xl font-bold mb-4">Editar cliente</h2>

    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Nombre</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}"
                   class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" 
                   required>
        </div>

        <!-- Apellido -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Apellido</label>
            <input type="text" name="apellido" value="{{ $cliente->apellido }}"
                   class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" 
                   required>
        </div>

        <!-- CI -->
        <div>
            <label class="block text-sm font-medium text-gray-200">CI / Documento</label>
            <input type="text" name="ci" value="{{ $cliente->ci }}"
                   class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" 
                   required>
        </div>

        <!-- Teléfono -->
        <div>
            <label class="block text-sm font-medium text-gray-200">Teléfono</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}"
                   class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" 
                   required>
        </div>
        
        <!-- Botones -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('clientes.index') }}" 
               class="bg-gray-600 px-4 py-2 rounded text-gray-100 hover:bg-gray-500">Cancelar</a>
            <button type="submit" 
                    class="bg-yellow-400 px-4 py-2 rounded text-gray-900 font-semibold hover:bg-yellow-300">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection

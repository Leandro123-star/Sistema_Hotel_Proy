@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-900 rounded-lg shadow-lg w-full max-w-md p-6">
        <!-- Encabezado -->
        <h2 class="text-xl font-bold text-white mb-4">Nuevo tipo</h2>

        <!-- Formulario -->
        <form action="{{ route('tipos.store') }}" method="POST">
            @csrf

            <!-- Nombre del tipo -->
            <div class="mb-4">
                <label for="nombre_tipo" class="block text-sm font-medium text-gray-300">Nombre del tipo</label>
                <input type="text" name="nombre_tipo" id="nombre_tipo" 
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500" 
                       required>
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <label for="descripcion" class="block text-sm font-medium text-gray-300">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                          class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"></textarea>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('tipos.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                   Cancelar
                </a>
                <button type="submit" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

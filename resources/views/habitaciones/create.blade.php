@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-900 rounded-lg shadow-lg w-full max-w-lg p-6">
        <!-- Encabezado -->
        <h2 class="text-xl font-bold text-white mb-4">Nueva habitación</h2>

        <!-- Formulario -->
        <form action="{{ route('habitaciones.store') }}" method="POST">
            @csrf

            <!-- Número -->
            <div class="mb-4">
                <label for="numero" class="block text-sm font-medium text-gray-300">Número</label>
                <input type="text" name="numero" id="numero"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Piso -->
            <div class="mb-4">
                <label for="piso" class="block text-sm font-medium text-gray-300">Piso</label>
                <input type="number" name="piso" id="piso"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Capacidad -->
            <div class="mb-4">
                <label for="capacidad" class="block text-sm font-medium text-gray-300">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Precio por noche -->
            <div class="mb-4">
                <label for="precio_noche" class="block text-sm font-medium text-gray-300">Precio/Noche ($)</label>
                <input type="number" step="0.01" name="precio_noche" id="precio_noche"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Tipo de habitación -->
            <div class="mb-4">
                <label for="id_tipo" class="block text-sm font-medium text-gray-300">Tipo de habitación</label>
                <select name="id_tipo" id="id_tipo"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                        required>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id_tipo }}">{{ $tipo->nombre_tipo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado -->
            <div class="mb-6">
                <label for="estado" class="block text-sm font-medium text-gray-300">Estado</label>
                <select name="estado" id="estado"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                        required>
                    <option value="disponible">Disponible</option>
                    <option value="ocupada">Ocupada</option>
                    <option value="mantenimiento">Mantenimiento</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('habitaciones.index') }}"
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

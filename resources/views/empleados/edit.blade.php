@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-900 rounded-lg shadow-lg w-full max-w-md p-6">
        <!-- Encabezado -->
        <h2 class="text-xl font-bold text-white mb-4">Editar empleado</h2>

        <!-- Formulario -->
        <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $empleado->nombre }}"
                       pattern="[A-Za-z\s]+"
                       onkeypress="return /[a-zA-Z\s]/.test(event.key)"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Apellido -->
            <div class="mb-4">
                <label for="apellido" class="block text-sm font-medium text-gray-300">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="{{ $empleado->apellido }}"
                       pattern="[A-Za-z\s]+"
                       onkeypress="return /[a-zA-Z\s]/.test(event.key)"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Cargo -->
            <div class="mb-4">
                <label for="cargo" class="block text-sm font-medium text-gray-300">Cargo</label>
                <select name="cargo" id="cargo"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                        required>
                    <option value="Recepcionista" {{ $empleado->cargo == 'Recepcionista' ? 'selected' : '' }}>Recepcionista</option>
                    <option value="Gerente" {{ $empleado->cargo == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                    <option value="Ama de llaves" {{ $empleado->cargo == 'Ama de llaves' ? 'selected' : '' }}>Ama de llaves</option>
                    <option value="Mantenimiento" {{ $empleado->cargo == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
            </div>

            <!-- Teléfono -->
            <div class="mb-6">
                <label for="telefono" class="block text-sm font-medium text-gray-300">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="{{ $empleado->telefono }}"
                       pattern="[0-9]+"
                       onkeypress="return /[0-9]/.test(event.key)"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('empleados.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                   Cancelar
                </a>
                <button type="submit" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

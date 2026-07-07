@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-900 rounded-lg shadow-lg w-full max-w-lg p-6">
        <h2 class="text-xl font-bold text-white mb-4">Editar usuario</h2>

        <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Empleado -->
            <div class="mb-4">
                <label for="id_empleado" class="block text-sm font-medium text-gray-300">Empleado</label>
                <select name="id_empleado" id="id_empleado"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                        required>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}" 
                            {{ $usuario->id_empleado == $empleado->id_empleado ? 'selected' : '' }}>
                            {{ $empleado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Usuario -->
            <div class="mb-4">
                <label for="usuario" class="block text-sm font-medium text-gray-300">Usuario</label>
                <input type="text" name="usuario" id="usuario" value="{{ $usuario->usuario }}"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                       required>
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="contraseña" class="block text-sm font-medium text-gray-300">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña"
                       placeholder="Ingrese nueva contraseña si desea cambiarla"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2">
            </div>

            <!-- Rol -->
            <div class="mb-4">
                <label for="rol" class="block text-sm font-medium text-gray-300">Rol</label>
                <select name="rol" id="rol"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                        required>
                    <option value="administrador" {{ $usuario->rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="recepcionista" {{ $usuario->rol == 'recepcionista' ? 'selected' : '' }}>Recepcionista</option>
                </select>
            </div>

            <!-- Estado -->
            <div class="mb-6">
                <label for="estado" class="block text-sm font-medium text-gray-300">Estado</label>
                <select name="estado" id="estado"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                        required>
                    <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('usuarios.index') }}"
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

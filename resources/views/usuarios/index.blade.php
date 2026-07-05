@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-gray-900 min-h-screen text-white">
    <!-- Encabezado -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Usuarios</h1>
            <p class="text-sm text-gray-400">{{ $usuarios->count() }} usuarios registrados</p>
        </div>
        <a href="{{ route('usuarios.create') }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg shadow">
            + Crear usuario
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Empleado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Rol</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($usuarios as $usuario)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $usuario->id_usuario }}</td>
                    <td class="px-6 py-4 text-sm">{{ $usuario->empleado ? $usuario->empleado->nombre : 'Sin empleado' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $usuario->usuario }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 py-1 rounded-md 
                            {{ $usuario->rol === 'administrador' ? 'bg-blue-600 text-white' : 'bg-green-600 text-white' }}">
                            {{ $usuario->rol }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm capitalize">
                        <span class="px-2 py-1 rounded-md 
                            {{ $usuario->estado === 'activo' ? 'bg-yellow-500 text-white' : 'bg-gray-500 text-white' }}">
                            {{ $usuario->estado }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm mr-2">
                           Editar
                        </a>
                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" class="inline">
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
                    <td colspan="6" class="px-6 py-4 text-center text-gray-400">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

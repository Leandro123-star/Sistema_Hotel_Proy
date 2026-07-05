@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-gray-900 min-h-screen text-white">
    <!-- Encabezado -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Habitaciones</h1>
            <p class="text-sm text-gray-400">{{ $habitaciones->count() }} habitaciones en total</p>
        </div>
        <a href="{{ route('habitaciones.create') }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg shadow">
            + Nueva habitación
        </a>
    </div>

    <!-- Estados -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-gray-800 p-4 rounded-lg shadow">
            <h3 class="text-yellow-400 font-semibold">Disponible</h3>
            <p class="text-gray-200 mt-2">{{ $habitaciones->where('estado','disponible')->count() }}</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg shadow">
            <h3 class="text-yellow-400 font-semibold">Ocupada</h3>
            <p class="text-gray-200 mt-2">{{ $habitaciones->where('estado','ocupada')->count() }}</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg shadow">
            <h3 class="text-yellow-400 font-semibold">Mantenimiento</h3>
            <p class="text-gray-200 mt-2">{{ $habitaciones->where('estado','mantenimiento')->count() }}</p>
        </div>
    </div>

    <!-- Filtros -->
    <div class="flex space-x-4 mb-6">
        <span class="bg-gray-800 px-3 py-1 rounded-lg text-sm">Todos ({{ $habitaciones->count() }})</span>
        <span class="bg-gray-800 px-3 py-1 rounded-lg text-sm">Disponible ({{ $habitaciones->where('estado','disponible')->count() }})</span>
        <span class="bg-gray-800 px-3 py-1 rounded-lg text-sm">Ocupada ({{ $habitaciones->where('estado','ocupada')->count() }})</span>
        <span class="bg-gray-800 px-3 py-1 rounded-lg text-sm">Mantenimiento ({{ $habitaciones->where('estado','mantenimiento')->count() }})</span>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">N°</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Piso</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Capacidad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Precio/Noche</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($habitaciones as $habitacion)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $habitacion->numero }}</td>
                    <td class="px-6 py-4 text-sm">{{ $habitacion->piso }}</td>
                    <td class="px-6 py-4 text-sm">{{ $habitacion->tipoHabitacion ? $habitacion->tipoHabitacion->nombre_tipo : 'Sin tipo' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $habitacion->capacidad }} personas</td>
                    <td class="px-6 py-4 text-sm">Bs {{ $habitacion->precio_noche }}</td>
                    <td class="px-6 py-4 text-sm capitalize">{{ $habitacion->estado }}</td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('habitaciones.edit', $habitacion->id_habitacion) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm mr-2">
                           Editar
                        </a>
                        <form action="{{ route('habitaciones.destroy', $habitacion->id_habitacion) }}" method="POST" class="inline">
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
                    <td colspan="7" class="px-6 py-4 text-center text-gray-400">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

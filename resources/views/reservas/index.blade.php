@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-gray-900 min-h-screen text-white">
    <!-- Encabezado -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Reservas</h1>
            <p class="text-sm text-gray-400">{{ $reservas->count() }} reservas en total</p>
        </div>
        <a href="{{ route('reservas.create') }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg shadow">
            + Nueva reserva
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Empleado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Fechas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Habitaciones</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($reservas as $reserva)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $reserva->id_reserva }}</td>
                    <td class="px-6 py-4 text-sm">{{ $reserva->cliente ? $reserva->cliente->nombre : 'Sin cliente' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $reserva->empleado ? $reserva->empleado->nombre : 'Sin empleado' }}</td>
                    <td class="px-6 py-4 text-sm">
                        Reserva: {{ $reserva->fecha_reserva }} <br>
                        Entrada: {{ $reserva->fecha_entrada }} <br>
                        Salida: {{ $reserva->fecha_salida }}
                    </td>
                    <td class="px-6 py-4 text-sm">
                        @forelse($reserva->habitaciones as $habitacion)
                            Habitación {{ $habitacion->numero }} (Piso {{ $habitacion->piso }}) <br>
                        @empty
                            <span class="text-gray-400">Sin habitaciones</span>
                        @endforelse
                    </td>
                    <td class="px-6 py-4 text-sm capitalize">{{ $reserva->estado }}</td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('reservas.edit', $reserva->id_reserva) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm mr-2">
                           Editar
                        </a>
                        <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}" method="POST" class="inline">
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


@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-gray-900 min-h-screen text-white">
    <!-- Encabezado -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Pagos</h1>
            <p class="text-sm text-gray-400">
                {{ $pagos->count() }} pagos · Total: Bs {{ number_format($pagos->sum('monto'), 2) }}
            </p>
        </div>
        <a href="{{ route('pagos.create') }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg shadow">
            + Registrar pago
        </a>
    </div>

    <!-- Resumen por método -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-gray-800 rounded-lg p-4 shadow">
            <h3 class="text-lg font-semibold text-yellow-400">Efectivo</h3>
            <p class="text-sm text-gray-300">Bs {{ number_format($pagos->where('metodo_pago','efectivo')->sum('monto'), 2) }}</p>
            <p class="text-xs text-gray-400">{{ $pagos->where('metodo_pago','efectivo')->count() }} transacciones</p>
        </div>
        <div class="bg-gray-800 rounded-lg p-4 shadow">
            <h3 class="text-lg font-semibold text-yellow-400">QR</h3>
            <p class="text-sm text-gray-300">Bs {{ number_format($pagos->where('metodo_pago','qr')->sum('monto'), 2) }}</p>
            <p class="text-xs text-gray-400">{{ $pagos->where('metodo_pago','qr')->count() }} transacciones</p>
        </div>
    </div>
    
    <!-- Tabla -->
    <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Reserva</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Fecha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Monto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Método</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($pagos as $pago)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $pago->id_pago }}</td>
                    <td class="px-6 py-4 text-sm">
                        {{ $pago->reserva ? 'Reserva #' . $pago->reserva->id_reserva : 'Sin reserva' }}
                    </td>
                    <td class="px-6 py-4 text-sm">{{ $pago->fecha_pago }}</td>
                    <td class="px-6 py-4 text-sm">Bs {{ number_format($pago->monto, 2) }}</td>
                    <td class="px-6 py-4 text-sm capitalize">{{ $pago->metodo_pago }}</td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('pagos.edit', $pago->id_pago) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm mr-2">
                           Editar
                        </a>
                        <form action="{{ route('pagos.destroy', $pago->id_pago) }}" method="POST" class="inline">
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

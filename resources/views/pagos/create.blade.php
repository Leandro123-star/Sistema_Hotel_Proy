@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-900 rounded-lg shadow-lg w-full max-w-lg p-6">
        <!-- Encabezado -->
        <h2 class="text-xl font-bold text-white mb-4">Registrar pago</h2>

        <!-- Formulario -->
        <form action="{{ route('pagos.store') }}" method="POST">
            @csrf

            <!-- Reserva -->
            <div class="mb-4">
                <label for="id_reserva" class="block text-sm font-medium text-gray-300">Reserva</label>
                <select name="id_reserva" id="id_reserva"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                        required>
                    <option value="">— Seleccionar —</option>
                    @foreach($reservas as $reserva)
                        <option value="{{ $reserva->id_reserva }}">
                            Reserva #{{ $reserva->id_reserva }} - Cliente: {{ $reserva->cliente->nombre ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha de pago -->
            <div class="mb-4">
                <label for="fecha_pago" class="block text-sm font-medium text-gray-300">Fecha de pago</label>
                <input type="date" name="fecha_pago" id="fecha_pago"
                       value="{{ old('fecha_pago', date('Y-m-d')) }}"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Monto -->
            <div class="mb-4">
                <label for="monto" class="block text-sm font-medium text-gray-300">Monto (Bs)</label>
                <input type="number" step="0.01" name="monto" id="monto"
                       value="{{ old('monto', 0) }}"
                       class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
            </div>

            <!-- Método de pago -->
            <div class="mb-6">
                <label for="metodo_pago" class="block text-sm font-medium text-gray-300">Método de pago</label>
                <select name="metodo_pago" id="metodo_pago"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                        required>
                    <option value="efectivo">Efectivo</option>
                    <option value="qr">QR</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('pagos.index') }}"
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

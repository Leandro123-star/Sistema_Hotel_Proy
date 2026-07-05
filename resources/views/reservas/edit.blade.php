@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-900 rounded-lg shadow-lg w-full max-w-2xl p-6">
        <!-- Encabezado -->
        <h2 class="text-xl font-bold text-white mb-4">Editar reserva</h2>

        <!-- Formulario -->
        <form action="{{ route('reservas.update', $reserva->id_reserva) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Cliente -->
            <div class="mb-4">
                <label for="id_cliente" class="block text-sm font-medium text-gray-300">Cliente</label>
                <select name="id_cliente" id="id_cliente"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                        required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}" 
                            {{ old('id_cliente', $reserva->id_cliente) == $cliente->id_cliente ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Empleado -->
            <div class="mb-4">
                <label for="id_empleado" class="block text-sm font-medium text-gray-300">Empleado</label>
                <select name="id_empleado" id="id_empleado"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                        required>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}" 
                            {{ old('id_empleado', $reserva->id_empleado) == $empleado->id_empleado ? 'selected' : '' }}>
                            {{ $empleado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fechas -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="fecha_reserva" class="block text-sm font-medium text-gray-300">Fecha reserva</label>
                    <input type="date" name="fecha_reserva" id="fecha_reserva"
                           value="{{ old('fecha_reserva', $reserva->fecha_reserva) }}"
                           class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                           required>
                </div>
                <div>
                    <label for="fecha_entrada" class="block text-sm font-medium text-gray-300">Entrada</label>
                    <input type="date" name="fecha_entrada" id="fecha_entrada"
                           value="{{ old('fecha_entrada', $reserva->fecha_entrada) }}"
                           class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                           required>
                </div>
                <div>
                    <label for="fecha_salida" class="block text-sm font-medium text-gray-300">Salida</label>
                    <input type="date" name="fecha_salida" id="fecha_salida"
                           value="{{ old('fecha_salida', $reserva->fecha_salida) }}"
                           class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                           required>
                </div>
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-300">Estado</label>
                <select name="estado" id="estado"
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2"
                        required>
                    <option value="pendiente" {{ old('estado', $reserva->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="confirmada" {{ old('estado', $reserva->estado) == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                    <option value="cancelada" {{ old('estado', $reserva->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <!-- Habitaciones (select múltiple) -->
            <div class="mb-6">
                <label for="habitaciones" class="block text-sm font-medium text-gray-300">Habitaciones</label>
                <select name="habitaciones[]" id="habitaciones" multiple
                        class="mt-1 block w-full rounded-md bg-gray-800 border border-gray-700 text-white px-3 py-2 focus:ring-yellow-500 focus:border-yellow-500"
                        required>
                    @foreach($habitaciones as $habitacion)
                        <option value="{{ $habitacion->id_habitacion }}"
                            {{ in_array($habitacion->id_habitacion, old('habitaciones', $reserva->habitaciones->pluck('id_habitacion')->toArray())) ? 'selected' : '' }}>
                            Habitación {{ $habitacion->numero }} (Piso {{ $habitacion->piso }})
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">Mantén presionada la tecla Ctrl (Windows) o Cmd (Mac) para seleccionar varias habitaciones.</p>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('reservas.index') }}"
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

@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-yellow-400 text-3xl font-bold mb-6">Panel general</h1>
    <p class="text-gray-300 mb-8">{{ \Carbon\Carbon::now()->translatedFormat('l, d \\d\\e F \\d\\e Y') }}</p>

   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Clientes -->
        <div class="bg-gray-800 p-6 rounded shadow">
            <h2 class="text-yellow-400 text-xl font-bold">Clientes</h2>
            <p class="text-gray-200 mt-2">{{ $clientes }} huéspedes registrados</p>
        </div>
        <!-- Habitaciones -->
        <div class="bg-gray-800 p-6 rounded shadow">
            <h2 class="text-yellow-400 text-xl font-bold">Habitaciones</h2>
            <p class="text-gray-200 mt-2">{{ $habitaciones }}</p>
            <p class="text-gray-400">{{ $habitacionesDisponibles }} disponibles</p>
        </div>
        <!-- Reservas -->
        <div class="bg-gray-800 p-6 rounded shadow">
            <h2 class="text-yellow-400 text-xl font-bold">Reservas</h2>
            <p class="text-gray-200 mt-2">{{ $reservas }}</p>
            <p class="text-gray-400">{{ $reservasConfirmadas }} confirmadas · {{ $reservasPendientes }} pendientes</p>
        </div>
        <!-- Empleados -->
        <div class="bg-gray-800 p-6 rounded shadow">
            <h2 class="text-yellow-400 text-xl font-bold">Empleados</h2>
            <p class="text-gray-200 mt-2">{{ $empleados }}</p>
            <p class="text-gray-400">personal activo</p>
        </div>
    </div>
</div>
@endsection

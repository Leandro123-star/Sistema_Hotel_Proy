<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelSys</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="bg-gray-900 text-gray-100">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 p-6">
            <h2 class="text-yellow-400 text-2xl font-bold mb-6">HotelSys</h2>
      <nav class="space-y-2 text-gray-300">
    <!-- Panel -->
    <a href="{{ route('panel') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-gauge-high w-5 h-5 mr-2 text-white"></i>
        Panel
    </a>
    <!-- Usuarios (solo administrador) -->
@auth
    @if(auth()->user()->rol === 'administrador')
        <a href="{{ route('usuarios.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
            <i class="fa-solid fa-user-shield w-5 h-5 mr-2 text-white"></i>
            Usuarios
        </a>
    @endif
@endauth
    <!-- Clientes -->
    <a href="{{ route('clientes.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-users w-5 h-5 mr-2 text-white"></i>
        Clientes
    </a>

    <!-- Habitaciones -->
    <a href="{{ route('habitaciones.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-bed w-5 h-5 mr-2 text-white"></i>
        Habitaciones
    </a>

    <!-- Tipos -->
    <a href="{{ route('tipos.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-layer-group w-5 h-5 mr-2 text-white"></i>
        Tipos
    </a>

    <!-- Reservas -->
    <a href="{{ route('reservas.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-calendar-check w-5 h-5 mr-2 text-white"></i>
        Reservas
    </a>

    <!-- Pagos -->
    <a href="{{ route('pagos.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-credit-card w-5 h-5 mr-2 text-white"></i>
        Pagos
    </a>

    <!-- Empleados -->
    <a href="{{ route('empleados.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700">
        <i class="fa-solid fa-user-tie w-5 h-5 mr-2 text-white"></i>
        Empleados
    </a>
</nav>



        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>

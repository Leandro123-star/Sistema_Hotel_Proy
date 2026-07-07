<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelSys - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-yellow-400 mb-2 text-center">Iniciar sesión</h2>
        <p class="text-gray-400 text-center mb-6">Accede a tu panel de administración</p>

        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Usuario -->
            <div class="mb-4">
                <label for="usuario" class="block text-gray-300 mb-2">Usuario</label>
                <input id="usuario" type="text" name="usuario" required autofocus
                    class="w-full px-4 py-2 rounded bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-300 mb-2">Contraseña</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2 rounded bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Botón -->
            <button type="submit"
                    class="w-full bg-yellow-400 text-gray-900 font-bold py-2 rounded hover:bg-yellow-500 transition">
                Ingresar al sistema
            </button>
        </form>

        <!-- Nota -->
        <p class="text-xs text-gray-500 text-center mt-6">
            Solo el personal autorizado puede acceder a este sistema.
        </p>
    </div>

</body>
</html>

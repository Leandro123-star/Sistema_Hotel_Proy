<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesar login
     */
    public function login(Request $request)
{
    $credentials = $request->validate([
        'usuario' => ['required', 'string'],
        'password' => ['required'],
    ]);

    // Intentar login usando el campo 'usuario'
    if (Auth::attempt([
        'usuario' => $credentials['usuario'],
        'password' => $credentials['password'],
    ])) {
        $request->session()->regenerate();
        return redirect()->intended('panel');
    }

    return back()->withErrors([
        'usuario' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('usuario');
}
    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

//4114     

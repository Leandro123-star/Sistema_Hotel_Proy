<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = Usuario::with('empleado')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        $empleados = Empleado::all();
        return view('usuarios.create', compact('empleados'));
    }

    public function store(Request $request) {
        Usuario::create([
            'id_empleado' => $request->id_empleado,
            'usuario' => $request->usuario,
            'contraseña' => bcrypt($request->contraseña),
            'rol' => $request->rol,
            'estado' => $request->estado,
        ]);
        return redirect()->route('usuarios.index');
    }

    public function edit($id) {
        $usuario = Usuario::findOrFail($id);
        $empleados = Empleado::all();
        return view('usuarios.edit', compact('usuario','empleados'));
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'id_empleado' => $request->id_empleado,
            'usuario' => $request->usuario,
            'contraseña' => bcrypt($request->contraseña),
            'rol' => $request->rol,
            'estado' => $request->estado,
        ]);
        return redirect()->route('usuarios.index');
    }

    public function destroy($id) {
        Usuario::destroy($id);
        return redirect()->route('usuarios.index');
    }
}

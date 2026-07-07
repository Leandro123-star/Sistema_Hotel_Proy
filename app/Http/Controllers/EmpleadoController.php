<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
     public function index() {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create() {
        return view('empleados.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => ['required', 'regex:/^[A-Za-z\s]+$/'],
        'apellido' => ['required', 'regex:/^[A-Za-z\s]+$/'],
        'cargo' => ['required', 'regex:/^[A-Za-z\s]+$/'],
        'telefono' => ['required', 'regex:/^[0-9]+$/'],
    ]);

    Empleado::create($request->all());

    return redirect()->route('empleados.index')
                     ->with('success', 'Empleado creado correctamente.');
}

    public function edit($id) {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id) {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    public function destroy($id) {
        Empleado::destroy($id);
        return redirect()->route('empleados.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class TipoHabitacionController extends Controller
{
    public function index() {
        $tipos = TipoHabitacion::all();
        return view('tipos.index', compact('tipos'));
    }

    public function create() {
        return view('tipos.create');
    }

  public function store(Request $request) {
    $request->validate([
        'nombre_tipo' => ['required', 'regex:/^[A-Za-z\s]+$/'],
        'descripcion' => ['nullable', 'string'],
    ]);

    TipoHabitacion::create($request->all());

    return redirect()->route('tipos.index')
                     ->with('success', 'Tipo de habitación creado correctamente.');
}

    public function edit($id) {
        $tipo = TipoHabitacion::findOrFail($id);
        return view('tipos.edit', compact('tipo'));
    }

 public function update(Request $request, $id) {
    $request->validate([
        'nombre_tipo' => ['required', 'regex:/^[A-Za-z\s]+$/'],
        'descripcion' => ['nullable', 'string'],
    ]);

    $tipo = TipoHabitacion::findOrFail($id);
    $tipo->update($request->all());

    return redirect()->route('tipos.index')
                     ->with('success', 'Tipo de habitación actualizado correctamente.');
}

    public function destroy($id) {
        TipoHabitacion::destroy($id);
        return redirect()->route('tipos.index');
    }
}

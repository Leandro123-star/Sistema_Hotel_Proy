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
        TipoHabitacion::create($request->all());
        return redirect()->route('tipos.index');
    }

    public function edit($id) {
        $tipo = TipoHabitacion::findOrFail($id);
        return view('tipos.edit', compact('tipo'));
    }

    public function update(Request $request, $id) {
        $tipo = TipoHabitacion::findOrFail($id);
        $tipo->update($request->all());
        return redirect()->route('tipos.index');
    }

    public function destroy($id) {
        TipoHabitacion::destroy($id);
        return redirect()->route('tipos.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index() {
        $habitaciones = Habitacion::all();
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function create() {
        return view('habitaciones.create');
    }

    public function store(Request $request) {
        Habitacion::create($request->all());
        return redirect()->route('habitaciones.index');
    }

    public function edit($id) {
        $habitacion = Habitacion::findOrFail($id);
        return view('habitaciones.edit', compact('habitacion'));
    }

    public function update(Request $request, $id) {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update($request->all());
        return redirect()->route('habitaciones.index');
    }

    public function destroy($id) {
        Habitacion::destroy($id);
        return redirect()->route('habitaciones.index');
    }
}
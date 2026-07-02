<?php

namespace App\Http\Controllers;

use App\Models\ReservaHabitacion;
use Illuminate\Http\Request;

class ReservaHabitacionController extends Controller
{
    public function index() {
        $detalles = ReservaHabitacion::all();
        return view('reserva_habitacion.index', compact('detalles'));
    }

    public function create() {
        return view('reserva_habitacion.create');
    }

    public function store(Request $request) {
        ReservaHabitacion::create($request->all());
        return redirect()->route('reserva_habitacion.index');
    }

    public function edit($id) {
        $detalle = ReservaHabitacion::findOrFail($id);
        return view('reserva_habitacion.edit', compact('detalle'));
    }

    public function update(Request $request, $id) {
        $detalle = ReservaHabitacion::findOrFail($id);
        $detalle->update($request->all());
        return redirect()->route('reserva_habitacion.index');
    }

    public function destroy($id) {
        ReservaHabitacion::destroy($id);
        return redirect()->route('reserva_habitacion.index');
    }
}

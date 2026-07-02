<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index() {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create() {
        return view('reservas.create');
    }

    public function store(Request $request) {
        Reserva::create($request->all());
        return redirect()->route('reservas.index');
    }

    public function edit($id) {
        $reserva = Reserva::findOrFail($id);
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, $id) {
        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());
        return redirect()->route('reservas.index');
    }

    public function destroy($id) {      
        Reserva::destroy($id);
        return redirect()->route('reservas.index');
    }
}

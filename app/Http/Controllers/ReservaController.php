<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
   public function index() {
    $reservas = Reserva::with(['cliente','empleado','habitaciones'])->get();
    return view('reservas.index', compact('reservas'));
}


    public function create() {
    $clientes = Cliente::all();
    $empleados = Empleado::all();
    $habitaciones = Habitacion::all();
    return view('reservas.create', compact('clientes','empleados','habitaciones'));
}


    public function store(Request $request) {
    $reserva = Reserva::create($request->only([
        'id_cliente','id_empleado','fecha_reserva','fecha_entrada','fecha_salida','estado'
    ]));

    // Guardar habitaciones seleccionadas en la tabla intermedia
    $reserva->habitaciones()->attach($request->habitaciones);

    return redirect()->route('reservas.index')->with('success','Reserva creada correctamente');
}


   public function edit($id) {
    $reserva = Reserva::with('habitaciones')->findOrFail($id);
    $clientes = Cliente::all();
    $empleados = Empleado::all();
    $habitaciones = Habitacion::all();
    return view('reservas.edit', compact('reserva','clientes','empleados','habitaciones'));
}

    public function update(Request $request, $id) {
    $reserva = Reserva::findOrFail($id);

    $reserva->update($request->only([
        'id_cliente','id_empleado','fecha_reserva','fecha_entrada','fecha_salida','estado'
    ]));

    // Actualizar habitaciones asociadas
    $reserva->habitaciones()->sync($request->habitaciones);

    return redirect()->route('reservas.index')->with('success','Reserva actualizada correctamente');
}


    public function destroy($id) {      
        Reserva::destroy($id);
        return redirect()->route('reservas.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index() {
        $habitaciones = Habitacion::with('tipoHabitacion')->get();
        return view('habitaciones.index', compact('habitaciones'));
    }

     public function create()
    {
        // Traemos todos los tipos de habitación
        $tipos = TipoHabitacion::all();

        // Pasamos la variable a la vista
        return view('habitaciones.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        Habitacion::create($request->all());
        return redirect()->route('habitaciones.index')
                         ->with('success', 'Habitación creada correctamente');
    }
    

   public function edit($id) {
    $habitacion = Habitacion::findOrFail($id);
    $tipos = TipoHabitacion::all();
    return view('habitaciones.edit', compact('habitacion','tipos'));
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
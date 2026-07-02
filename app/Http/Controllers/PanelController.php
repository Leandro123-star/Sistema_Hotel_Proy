<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Empleado;

class PanelController extends Controller
{
     public function index()
    {
        $clientes = Cliente::count();
        $habitaciones = Habitacion::count();
        $habitacionesDisponibles = Habitacion::where('estado', 'disponible')->count();
        $reservas = Reserva::count();
        $reservasConfirmadas = Reserva::where('estado', 'confirmada')->count();
        $reservasPendientes = Reserva::where('estado', 'pendiente')->count();
        $empleados = Empleado::count();

        return view('panel.index', compact(
            'clientes',
            'habitaciones',
            'habitacionesDisponibles',
            'reservas',
            'reservasConfirmadas',
            'reservasPendientes',
            'empleados'
        ));
    }
}

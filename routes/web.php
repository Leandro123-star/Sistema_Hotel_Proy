<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ReservaHabitacionController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/panel', function () {
    return view('panel.index'); // o la vista que quieras mostrar
})->name('panel');

Route::resource('clientes', ClienteController::class);
Route::resource('habitaciones', HabitacionController::class);
Route::resource('tipos', TipoHabitacionController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('pagos', PagoController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('reserva_habitacion', ReservaHabitacionController::class);
Route::resource('usuarios', UsuarioController::class);


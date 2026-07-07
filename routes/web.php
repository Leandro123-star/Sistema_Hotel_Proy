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
use App\Http\Controllers\PanelController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/panel', [PanelController::class, 'index'])->name('panel');
Route::resource('clientes', ClienteController::class);
Route::resource('habitaciones', HabitacionController::class);
Route::resource('tipos', TipoHabitacionController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('pagos', PagoController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('reserva_habitacion', ReservaHabitacionController::class);
Route::resource('usuarios', UsuarioController::class)
    ->middleware('checkrole');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




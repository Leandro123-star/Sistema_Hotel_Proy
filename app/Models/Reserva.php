<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
     protected $primaryKey = 'id_reserva';
    protected $fillable = ['id_cliente', 'id_empleado', 'fecha_reserva', 'fecha_entrada', 'fecha_salida', 'estado'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function pagos(){
        return $this->hasMany(Pago::class, 'id_reserva');
    }

    public function habitaciones(){
        return $this->belongsToMany(Habitacion::class, 'reserva_habitacion', 'id_reserva', 'id_habitacion');
    }
    
}

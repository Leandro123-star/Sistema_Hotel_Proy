<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
     protected $primaryKey = 'id_habitacion';
    protected $fillable = ['numero', 'piso', 'capacidad', 'precio_noche', 'estado', 'id_tipo'];

    public function tipoHabitacion(){
        return $this->belongsTo(TipoHabitacion::class, 'id_tipo', 'id_tipo');
    }
    
    public function reservas(){
            return $this->belongsToMany(Reserva::class, 'reserva_habitacion', 'id_habitacion', 'id_reserva');
    }
}

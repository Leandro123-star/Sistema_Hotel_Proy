<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaHabitacion extends Model
{
    protected $primaryKey = 'id_detalle';
    protected $fillable = ['id_reserva', 'id_habitacion'];
}

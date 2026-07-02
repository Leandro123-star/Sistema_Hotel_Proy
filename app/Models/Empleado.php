<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     protected $primaryKey = 'id_empleado';
    protected $fillable = ['nombre','apellido', 'cargo', 'telefono'];
    
    public function reservas(){
        return $this->hasMany(Reserva::class, 'id_empleado');
    }
    
    public function usuario(){
        return $this->hasOne(Usuario::class, 'id_empleado');
    }
}

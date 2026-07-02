<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_empleado', 'usuario', 'contraseña', 'rol', 'estado'];

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}

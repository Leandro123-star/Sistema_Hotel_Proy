<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = ['id_empleado', 'usuario', 'contraseña', 'rol', 'estado'];

    protected $hidden = [
        'contraseña',
    ];

    // Laravel necesita saber qué campo es la contraseña
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}

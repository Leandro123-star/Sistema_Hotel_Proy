<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
     protected $primaryKey = 'id_cliente';
    protected $fillable = ['nombre','apellido', 'ci','telefono','email'];
    
    public function reservas(){
        return $this->hasMany(Reserva::class, 'id_cliente');
    }
}

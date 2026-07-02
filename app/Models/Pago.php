<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
      protected $primaryKey = 'id_pago';
    protected $fillable = ['id_reserva', 'fecha_pago', 'monto', 'metodo_pago'];

    public function reserva(){
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}

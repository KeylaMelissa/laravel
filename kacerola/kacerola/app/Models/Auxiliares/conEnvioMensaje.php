<?php

namespace App\Models\Auxiliares;

use Illuminate\Database\Eloquent\Model;

class conEnvioMensaje extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'nombre',
    	'correo',
    	'mensaje',
    	'telefono',
    	'fecha_crea'
    ];
}

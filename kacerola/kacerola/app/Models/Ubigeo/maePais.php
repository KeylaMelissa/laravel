<?php

namespace App\Models\Ubigeo;

use App\Models\Ubigeo\maeDepartamento;
use Illuminate\Database\Eloquent\Model;

class maePais extends Model
{
    protected $fillable = [
    	'nombre',
    	'abreviatura',
    	'id_usuario_crea',
    	'fecha_crea'
    ];

    public function departamento()
    {
        return $this->hasMany(maeDepartamento::class);
    }
}

<?php

namespace App\Models\Ubigeo;


use App\Models\Ubigeo\maeDepartamento;
use App\Models\Ubigeo\maeDistrito;
use Illuminate\Database\Eloquent\Model;

class maeProvincia extends Model
{
    protected $fillable = [
    	'nombre',
    	'abreviatura',
    	'id_usuario_crea',
    	'fecha_crea'
    ];

     public function departamento()
    {
        return $this->belongsTo(maeDepartamento::class, 'departamento_id');
    }

    public function distrito()
    {
        return $this->hasMany(maeDistrito::class,'id');    
    }
}

<?php

namespace App\Models\Ubigeo;

use App\Models\Ubigeo\maePais;
use App\Models\Ubigeo\maeProvincia;
use App\ubigeo\Provincia;
use Illuminate\Database\Eloquent\Model;

class maeDepartamento extends Model
{
    protected $fillable = [
    	'nombre',
    	'abreviatura',
    	'id_usuario_crea',
    	'fecha_crea'
    ];

    public function provincias()
    {
        return $this->hasMany(maeProvincia::class, 'id');
    }

    public function pais()
    {
        return $this->belongsTo(maePais::class);
    }
}

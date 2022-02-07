<?php

namespace App\Models\Ubigeo;

use App\Models\Maestros\maeEmpresa;
use App\Models\Ubigeo\maeProvincia;
use Illuminate\Database\Eloquent\Model;

class maeDistrito extends Model
{
    protected $fillable = [
    	'nombre',
    	'abreviatura',
    	'id_usuario_crea',
    	'fecha_crea'
    ];

    public function provincia()
    {
        return $this->belongsTo(maeProvincia::class, 'provincia_id');
    }

    public function empresa()
    {
        return $this->hasMany(maeEmpresa::class,'distrito_id');
        //return  $this->belongsTo('App\Models\Maestros\maeEmpresa',"distrito_id","id");
    }
   
}

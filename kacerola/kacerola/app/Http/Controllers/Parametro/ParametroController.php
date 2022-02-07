<?php

namespace App\Http\Controllers\Parametro;

use App\Http\Controllers\ApiController;
use App\Models\Auxiliares\cfgParametro;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ParametroController extends ApiController
{
    public function parametros($id)
    {
        //ESTGRL
        global $codAuxiliar;
        $codAuxiliar =  cfgParametro::query()
                    ->select('estado_cod_tabla_auxiliar')
                    ->where('cfg_parametros.id','=', $id)
                    ->get();

        $parametro = cfgParametro::query()
        ->select('cfg_parametros.*')
        ->where('cfg_parametros.id','=', $id )
        ->with([
            'estado' => function ($q ) {
                global $codAuxiliar;
                $array = json_decode($codAuxiliar);
                $q->select('cfg_tabla_auxiliar_detalles.*')
                  ->where('cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','=', $array[0]->estado_cod_tabla_auxiliar);
            }
        ])
        ->get();


        return $this->showAll($parametro);
    }
    
    public function show($id)
    {
         $parametro = cfgParametro::find($id);

        return $this->showOne($parametro);
    }

}

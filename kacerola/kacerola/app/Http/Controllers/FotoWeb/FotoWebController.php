<?php

namespace App\Http\Controllers\FotoWeb;

use App\Http\Controllers\ApiController;
use App\Models\Auxiliares\cfgFotoWeb;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class FotoWebController extends ApiController
{
    public function show($id)
    {
    	global $codAuxiliar;
        $codAuxiliar =  cfgFotoWeb::query()
                    ->select('seccion_web_cod_tabla_auxiliar')
                    ->where('cfg_foto_webs.id','=', $id)
                    ->get();

        $foto = cfgFotoWeb::query()
        ->select('cfg_foto_webs.*')
        ->where('cfg_foto_webs.id','=', $id )
        ->with([
            'seccionWeb' => function ($q ) {
                global $codAuxiliar;
                $array = json_decode($codAuxiliar);
                $q->select('cfg_tabla_auxiliar_detalles.*')
                  ->where('cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','=', $array[0]->seccion_web_cod_tabla_auxiliar);
            }
        ])
        ->get();


       // return $this->showAll($parametro);
        //$foto = cfgFotoWeb::find($id);

        return $this->showAll($foto);
    }

    public function verFoto($foto){

        return Image::make(public_path('images/fotos_web/' . $foto))->response();
    }

}

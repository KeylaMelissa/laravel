<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\ApiController;
use App\Models\Maestros\maeEmpresa;
use App\Models\Ubigeo\maeDistrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;


class EmpresaController extends ApiController
{
    

    public function show($id)
    {
        $empresa = maeEmpresa::select ('mae_empresas.*')
                 ->where('mae_empresas.id','=', $id )
                 ->with('distrito.provincia.departamento.pais')
                 ->get();

        return $this->showAll($empresa);

    }

    public function verFoto($foto){
       
        return Image::make(public_path('images/empresa/' . $foto))->response();
    }


}

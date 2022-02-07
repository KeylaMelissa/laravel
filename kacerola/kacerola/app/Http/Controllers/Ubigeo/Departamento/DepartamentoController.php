<?php

namespace App\Http\Controllers\Ubigeo\Departamento;

use App\Http\Controllers\ApiController;
use App\Models\Ubigeo\maeDepartamento;
use Illuminate\Http\Request;

class DepartamentoController extends ApiController
{
    public function autocompletadoDepartamento($term){

      
      if($term == ''){
         $departamentos = maeDepartamento::orderby('nombre','asc')->select('id','nombre')->limit(5)->get();
      }else{
         $departamentos = maeDepartamento::orderby('nombre','asc')->select('id','nombre')->where('nombre', 'like', '%' .$term . '%')->get();
      }

      return response()->json($departamentos);
   }
}

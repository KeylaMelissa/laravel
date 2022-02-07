<?php

namespace App\Http\Controllers\Ubigeo\Pais;

use App\Http\Controllers\ApiController;
use App\Models\Ubigeo\maePais;
use Illuminate\Http\Request;

class PaisController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = maePais::all();

        return $paises;
    }

    public function getPaises(Request $request){

      $search = $request->search;

      if($search == ''){
         $paises = maePais::orderby('nombre','asc')->select('id','nombre')->limit(5)->get();
      }else{
         $paises = maePais::orderby('nombre','asc')->select('id','nombre')->where('nombre', 'like', '%' .$search . '%')->limit(5)->get();
      }

      return response()->json($paises);
   }


    public function busqueda(Request $request)
    {
        $input = $request->all();

        if($request->get('busqueda')){
            $noticias = maePais::where("nombre", "LIKE", "%{$request->get('busqueda')}%")
                ->paginate(5);
        }else{
      $noticias = maePais::paginate(5);
        }

        return response($noticias);
    }
}

<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\ApiController;
use App\Models\Auxiliares\cfgTablaAuxiliar;
use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\Blog\blgCategoriaEntradaBlog;
use App\Models\Blog\blgEntradaBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class BlogController extends ApiController
{

    public function showCategoria($id)
    {
        /*$blog = blgCategoriaEntradaBlog::find($id);

        return  $this->showOne($blog);*/
        global $codAuxiliar;
        $codAuxiliar =  blgCategoriaEntradaBlog::query()
                    ->select('estado_cod_tabla_auxiliar')
                    ->where('blg_categoria_entrada_blogs.id','=', $id)
                    ->get();

        $blog = blgCategoriaEntradaBlog::query()
        ->select('blg_categoria_entrada_blogs.*')
        ->where('blg_categoria_entrada_blogs.id','=', $id )
        ->with([
            'estado' => function ($q ) {
                global $codAuxiliar;
                $array = json_decode($codAuxiliar);
                $q->select('cfg_tabla_auxiliar_detalles.*')
                  ->where('cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','=', $array[0]->estado_cod_tabla_auxiliar);
            }
        ])
        ->get();

        return $this->showAll($blog);
    }

    public function show($id)
    {
        global $codAuxiliar;
        $codAuxiliar =  blgEntradaBlog::query()
                    ->select('estado_entrada_blog_cod_tabla_auxiliar')
                    ->where('blg_entrada_blogs.id','=', $id)
                    ->get();

        $blog = blgEntradaBlog::query()
        ->select('blg_entrada_blogs.*')
        ->where('blg_entrada_blogs.id','=', $id )
        ->with([
            'estadoEntradaBlog' => function ($q ) {
                global $codAuxiliar;
                $array = json_decode($codAuxiliar);
                $q->select('cfg_tabla_auxiliar_detalles.*')
                  ->where('cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','=', $array[0]->estado_entrada_blog_cod_tabla_auxiliar);
            }
        ])
        ->with('categoria')
        ->get();

        return $this->showAll($blog);
    }
    
    public function listadoCategoria()
    {
        $listado = blgCategoriaEntradaBlog::all();

        return $this->showAll($listado);
    }

    public function topListadoCategoria()
    {
        $top = blgEntradaBlog:: orderby ('fecha_crea', 'desc') -> select ('*') 
        -> limit(3) -> get ();

        return response()->json($top);
    }

    public function topListadoPopulares()
    {
        $populares = blgEntradaBlog:: orderby ('titulo', 'asc') -> select ('*') 
        -> where('ind_recomendado','=',true)
        -> limit(3) -> get ();

        return response()->json($populares);
    }

    //FALTA EL PAGINADO
    public function listado(Request $request){

        $idCategoria = $request->idCategoria;

        $listado = blgEntradaBlog:: orderby ('blg_entrada_blogs.id', 'asc') -> select ('blg_entrada_blogs.*') 
        ->join( 'blg_categoria_entrada_blogs', 'blg_entrada_blogs.categoria_id', '=', 'blg_categoria_entrada_blogs.id' )
        ->where('blg_categoria_entrada_blogs.id', '=', $idCategoria)
        -> get ();

        return $this->showAllPag($listado);
    }

    public function create(Request $request)
    {

        $rules = [
            'titulo' => 'required',
            'foto_lista' => 'required',
            'foto_cuerpo' => 'required',
            'ind_recomendado' => 'required',
            'id_usuario_crea' => 'required',
            'estado_entrada_blog_cod_tabla_auxiliar' => 'required',
            'estado_entrada_blog_id' => 'required',
            'categoria_id' => 'required',
            'fecha_crea'
        ];

        $this-> validate($request,$rules);

        $campos = $request->all();
        
        $campos['fecha_crea'] = now();
        $campos['foto_lista'] =$request->foto_lista-> getClientOriginalName();
        $file = $request->foto_lista;
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('images')->put($nombre,  \File::get($file));

        $campos['foto_cuerpo'] = $request->foto_cuerpo->getClientOriginalName();
        $file2 = $request->foto_cuerpo;
        $nombre2 = $file2->getClientOriginalName();
        \Storage::disk('images')->put($nombre2,  \File::get($file2));


        $blog = blgEntradaBlog::create($campos);

        return $this->showOne($blog);
    }

    public function verFoto($foto){

        return Image::make(public_path('images/entradas_blog/' .$foto))->response();
    }


}


<?php

namespace App\Http\Controllers\HorarioAtencion;

use App\Http\Controllers\ApiController;
use App\Models\Maestros\maeHorarioAtencion;
use Illuminate\Http\Request;

class HorarioAtencionController extends ApiController
{
    public function listado()
    {
        $horarios = maeHorarioAtencion::all();

        return  $this->showAll($horarios);
    }

    public function index()
    {
        //
    }

   
}

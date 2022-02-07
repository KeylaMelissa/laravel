<?php

namespace App\Http\Controllers\EnvioMensaje;

use App\Http\Controllers\ApiController;
use App\Mail\EmergencyCallReceived;
use App\Models\Auxiliares\conEnvioMensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnvioMensajeController extends ApiController
{
    
    public function create(Request $request,conEnvioMensaje $con)
    {
        $rules = [
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
            'telefono' => 'required',
            'fecha_crea'
        ];

        $this-> validate($request,$rules);

        $campos = $request->all();
        $campos['fecha_crea'] = now();
        $envio = conEnvioMensaje::create($campos);

        $con=$envio;
        $envio = conEnvioMensaje::pluck('correo');
        Mail::to($envio)->send(new EmergencyCallReceived($con));

        return $this->showOne($con);


    }


    
}

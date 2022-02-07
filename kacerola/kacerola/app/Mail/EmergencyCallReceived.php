<?php

namespace App\Mail;

use App\Models\Auxiliares\conEnvioMensaje;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;

     public $mensaje;

    public function __construct(conEnvioMensaje $mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->view('mails.emergency_call');
    }
}

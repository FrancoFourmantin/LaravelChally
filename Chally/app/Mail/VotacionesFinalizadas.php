<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VotacionesFinalizadas extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $desafio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $desafio)
    {
        
        $this->subject('Las votaciones de  "' . $desafio->nombre . '" ha finalizado, ¡Y tu fuiste el ganador!');
        $this->desafio = $desafio;
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.votaciones_finalizadas');
    }
}

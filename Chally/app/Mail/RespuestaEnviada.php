<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RespuestaEnviada extends Mailable
{
    use Queueable, SerializesModels;

    public $nuevaRespuesta;
    public $desafio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nuevaRespuesta,$desafio)
    {
        $this->subject('¡Ya estás participando en el desafío!');
        $this->nuevaRespuesta=$nuevaRespuesta;
        $this->desafio=$desafio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.respuesta_enviada');
    }
}

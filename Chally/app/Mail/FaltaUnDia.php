<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FaltaUnDia extends Mailable
{
    use Queueable, SerializesModels;

    public $desafio;
    public $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($desafio , $usuario)
    {
        $this->subject('Falta 1 DÍA para que finalice uno de los desafios en el que has participado');
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
        return $this->view('emails.faltaUnDia');
    }
}

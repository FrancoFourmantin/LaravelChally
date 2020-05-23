<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DesafioFinalizado extends Mailable
{
    use Queueable, SerializesModels;

    public $desafio;
    public $participante;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($desafio , $participante)
    {

        $this->subject('El desafio ' . $desafio->nombre . ' ha finalizado, es hora de votar!');
        $this->desafio = $desafio;
        $this->participante = $participante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.desafio_finalizado');
    }
}

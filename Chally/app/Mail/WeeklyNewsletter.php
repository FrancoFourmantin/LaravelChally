<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeeklyNewsletter extends Mailable
{
    use Queueable, SerializesModels;
    public $desafiosSeleccionados;
    public $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($desafiosSeleccionados,$usuario)
    {
        $this->subject($usuario['nombre'] . ', ¡estos desafíos te van a interesar!');
        $this->desafiosSeleccionados = $desafiosSeleccionados;
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.weekly_newsletter');
    }
}

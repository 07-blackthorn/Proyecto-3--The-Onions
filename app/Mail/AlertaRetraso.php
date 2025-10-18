<?php

namespace App\Mail;

use App\Models\Reparacion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaRetraso extends Mailable
{
    use Queueable, SerializesModels;

    public $reparacion;

    /**
     * Crear una nueva instancia del mensaje.
     */
    public function __construct(Reparacion $reparacion)
    {
        $this->reparacion = $reparacion;
    }

    /**
     * Construir el correo.
     */
    public function build()
    {
        return $this->subject('Retraso en su reparación')
                    ->view('emails.alerta_retraso'); // Aquí va la vista que crearás
    }
}

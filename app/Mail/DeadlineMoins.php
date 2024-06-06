<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeadlineMoins extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $hebergement)
    {
        $this->user = $user;
        $this->hebergement = $hebergement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $heberge = $this->hebergement->libelle;
       $text = "Bonjour TEAM SUPPORT le domaine : "." ".$heberge." "."va bientot expiré";
       $path2 = "- " ;
        return $this->subject($text)->view('mail.domaine', ['user'=> $this->user, 'hebergement'=> $this->hebergement]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Catalogue extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.   
     *
     * @return void
     */  
    public $sub;
    public $mes;
    public function __construct($doc, $name)
    {
        //
        $this->doc = $doc;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $myName = $this->name;
        return $this->subject('Votre' .$myName. 'est disponible !')->view('mail.catalogue', ['doc'=> $this->doc, 'name'=> $this->name]);
        //return $this->view('mail.catalogue', compact("e_message"))->subject($e_subject);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $doc, $name)
    {
        $this->user = $user;
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
      
       $text = 'voici le catalogue de formation ILLIMITIS 2023 !';
       $path2 = "- " ;
        return $this->subject($this->user->prenom. ",". " " . $text )->view('mail.bienvenue_prospect', ['user'=> $this->user, 'doc'=> $this->doc, 'name'=> $this->name]);
    }
}

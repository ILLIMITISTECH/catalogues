<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\User;
use DB;

use Auth;

class BonDebutDeSemaine extends Notification
{
    use Queueable;  
    public $user; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
  
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];    
    }  

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $person = Auth::user();
        $indicateurs = DB::table('indicateurs')->select('indicateurs.id', 'indicateurs.libelle',
                    'indicateurs.cible', 'indicateurs.valeur_prec', 
                    'indicateurs.agent_id','indicateurs.pourcentage', 'indicateurs.created_at',
                    'agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id'
                    )
                    ->join('agents', 'agents.id', 'indicateurs.agent_id')
                    ->where('indicateurs.agent_id','=', $person->id)
                    //->orWhere('actions.bakup','=', $person->prenom)
                    ->get();
        $params = ["user" => $person, "indicateurs" => $indicateurs];
        return (new MailMessage)->view('mail.semaine', ['params' => $params]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
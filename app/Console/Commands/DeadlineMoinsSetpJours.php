<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notifications\Messages\MailMessage;

use App\Notifications\BonDebutDeSemaine;
use Notification;

use App\User;
use App\Mail\DeadlineMoins;
use DB;
use Auth;
use Mail;
   

class DeadlineMoinsSetpJours extends Command
{

    use Queueable;  
    /**
     * The name and signature of the console command.
     *
     * @var string  
     */
    //protected $signature = 'command:name';
    protected $signature = 'moins:sept';

    /**
     * The console command description.  
     *
     * @var string
     */
    //protected $description = 'Command description';
    protected $description = 'Envoyer un e-mail quotidien à tous les utilisateurs pour un rappel de leurs actions en instance';

    /**
     * Create a new command instance.
     *
     * @return void  
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];  
    }  

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    

    public function handle()
    {
        $year = date('Y');
        $month = date('m');
        $days1 = (date('d') + 5);
        $days2 = (date('d') + 25);
       
        
       
            $user = "ops@illimitis.com";
            $fallou = "fallou.g@illimitis.com";
            $anthyme = "anthyme.k@illimitis.com";
            $nadia = "nadia.t@illimitis.com";
            $fatou = "fatou.d@illimitis.com";
            $aminata = "aminata.o@illimitis.com";
            $josue = "josue.t@illimitis.com";
            $jean = "jeanmarie.n@illimitis.com";
            $hebergement = DB::table('hebergements')->whereYear('deadline', $year)
            ->whereMonth('deadline', $month)
            ->whereDay('deadline', '<=' , $days2)
            ->whereDay('deadline', '>=', $days1)
            ->first();
            if($hebergement)
            {
            //\Mail::to($user)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($fallou)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($anthyme)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($nadia)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($fatou)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($aminata)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($josue)->send(new DeadlineMoins($user, $hebergement));
            \Mail::to($jean)->send(new DeadlineMoins($user, $hebergement));
            } 
           
         
        $this->info('Mail de rappel hebdomadaire envoyé');
    }

}
<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use Session;

use App\Action;

use Auth;

use App\User;
use App\Agent;
use DB;

use App\Notifications\EscalationAction;
use App\Notifications\EscalationActionResponsable;
use App\Notifications\AlerteEscalation;
use Notification;

class UpdateAction extends Command
{
/**
* The name and signature of the console command.
*
* @var string
*/
protected $signature = "update:action";

/**
 * The console command description.
 *
 * @var string
 */
protected $description = 'Escalade l action si le délais est dépassé';

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
 * Execute the console command.
 *
 * @return mixed
 */
public function handle()
{ 

     $dates = date('Y/m/d');
        $users =  User::all(); 
        foreach($users as $user){
            $actions = DB::table('actions')->select('actions.id','actions.libelle','actions.bakup','actions.deadline','actions.raison','actions.agent_id','agents.superieur_id as superior','agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id')
                                          ->join('agents', 'agents.id', 'actions.agent_id')
                                          ->where('actions.deadline','<', $dates)
                                          ->where('actions.agent_id','=', $user->id)
                                          ->get();

            $actionsj = DB::table('actions')->select('actions.id','actions.libelle','actions.bakup','actions.deadline','actions.raison','actions.agent_id','agents.superieur_id as superior','agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id')
                                            ->join('agents', 'agents.id', 'actions.agent_id')
                                            ->whereRaw('? + interval 2 day = actions.deadline',[$dates])
                                            ->where('actions.agent_id','=', $user->id)
                                            ->get();

            if ($actionsj->count() > 0){
                foreach($actionsj as $action){
                    $id = $action->superior;
                    break;
                }

                $responsablej = User::find($id);
                if ($responsablej != null)
                {
                    // session(['responsable' => $responsable, 'actions' => $actions ]);
                    // $responsable->notify(new EscalationActionResponsable2());
                }
                session(['user' => $user, 'actions' => $actions ]);
                $user->notify(new AlerteEscalation());
              
            }

            if ($actions->count() > 0){
                foreach($actions as $action){
                    $id = $action->superior;
                    break;
                }

            $responsable = User::find($id);

                if ($responsable != null)
                {
                    session(['responsable' => $responsable, 'actions' => $actions ]);
                    $responsable->notify(new EscalationActionResponsable());
                }
                session(['user' => $user, 'actions' => $actions ]);
                $user->notify(new EscalationAction());
            
            }

        }

    $this->info('L\'escalation a été faite');
}

}

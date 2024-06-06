<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\Agent;
use App\Reunion;
use App\Suivi_action;
use App\Direction;
use App\Objectif;
use App\Indicateur;
use App\Suivi_indicateur;
use DB;
use Auth;
use App\User;
use Session;
  
class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //
        //$actions = Action::all();
        $directions = Direction::all();
        /*$actions = DB::table('actions')->select('actions.id', 'actions.deadline', 'actions.responsable', 'actions.bakup', 'actions.libelle', 'actions.note',
         'actions.agent_id','actions.reunion_id',  'actions.visibilite',  'actions.risque', 'actions.delais',
          'agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->join('reunions', 'reunions.id', 'actions.reunion_id')
          ->get();*/
           $actions = DB::table('directions')
          ->join('agents', 'agents.direction_id', 'directions.id')
          ->join('actions', 'actions.agent_id', 'agents.id')
          //->leftjoin('suivi_actions', 'suivi_actions.action_id', 'actions.id')
          ->select('actions.id',
                  'actions.libelle', 'actions.responsable', 'actions.bakup', 'actions.raison','actions.deadline',
                  'actions.risque','actions.delais', 'actions.visibilite','actions.created_at', 'actions.pourcentage', 'actions.note',
                  'agents.prenom', 'agents.nom', 'agents.photo','agents.niveau_hieracie', 'agents.direction_id', 'agents.date_naiss', 'agents.id as Id',
                  'directions.nom_direction','directions.id as ID')
                  ->orderBY('actions.risque','ASC')
                  ->get();
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('cameg/action.lister', compact('actions','directions','headers'));
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_actions()
    {  
        //
        //$actions = Action::all();
        $directions = Direction::all();
        /*$actions = DB::table('actions')->select('actions.id', 'actions.deadline', 'actions.responsable', 'actions.bakup', 'actions.libelle', 'actions.note',
         'actions.agent_id','actions.reunion_id',  'actions.visibilite',  'actions.risque', 'actions.delais',
          'agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->join('reunions', 'reunions.id', 'actions.reunion_id')
          ->get();*/
           $actions = DB::table('directions')
          ->join('agents', 'agents.direction_id', 'directions.id')
          ->join('actions', 'actions.agent_id', 'agents.id')
          //->leftjoin('suivi_actions', 'suivi_actions.action_id', 'actions.id')
          ->select('actions.id',
                  'actions.libelle', 'actions.responsable', 'actions.bakup', 'actions.raison','actions.deadline',
                  'actions.risque','actions.delais', 'actions.visibilite','actions.created_at', 'actions.pourcentage', 'actions.note',
                  'agents.prenom', 'agents.nom', 'agents.photo','agents.niveau_hieracie', 'agents.direction_id', 'agents.date_naiss', 'agents.id as Id',
                  'directions.nom_direction','directions.id as ID')
                  ->orderBY('actions.risque','ASC')
                  ->get();
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.list', compact('actions','directions','headers'));
    } 
    
    
     public function filter(Request $request){
        $search = $request->get('search');
        $directions = Direction::all();
        

          $actions = DB::table('directions')
          ->join('agents', 'agents.direction_id', 'directions.id')
          ->join('actions', 'actions.agent_id', 'agents.id')
          //->leftjoin('suivi_actions', 'suivi_actions.action_id', 'actions.id')
          ->select('actions.id',
                  'actions.libelle', 'actions.responsable', 'actions.bakup', 'actions.raison','actions.deadline',
                  'actions.risque','actions.delais', 'actions.visibilite','actions.created_at', 'actions.pourcentage', 'actions.note',
                  'agents.prenom', 'agents.nom', 'agents.photo','agents.niveau_hieracie', 'agents.direction_id', 'agents.date_naiss', 'agents.id as Id',
                  'directions.nom_direction','directions.id as ID')
                  ->where('directions.nom_direction', 'like', '%'.$search.'%')
                  ->orderBY('actions.risque','ASC')
                  ->get();
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
        return view('cameg/action.lister', compact('actions','action_directions','directions','headers'));
      }    

   public function voir_action_dg()
    {  
        //
        //$actions = Action::all();
        $directions = Direction::all();
        /*$actions = DB::table('actions')->select('actions.id', 'actions.deadline', 'actions.responsable', 'actions.bakup', 'actions.libelle', 'actions.note',
         'actions.agent_id','actions.reunion_id',  'actions.visibilite',  'actions.risque', 'actions.delais',
          'agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->join('reunions', 'reunions.id', 'actions.reunion_id')
          ->get();*/
           $actions = DB::table('directions')
          ->join('agents', 'agents.direction_id', 'directions.id')
          ->join('actions', 'actions.agent_id', 'agents.id')
          //->leftjoin('suivi_actions', 'suivi_actions.action_id', 'actions.id')
          ->select('actions.id',
                  'actions.libelle', 'actions.responsable', 'actions.bakup', 'actions.raison','actions.deadline',
                  'actions.risque','actions.delais', 'actions.visibilite','actions.created_at', 'actions.updated_at', 'actions.pourcentage', 'actions.note',
                  'agents.prenom', 'agents.nom', 'agents.photo','agents.niveau_hieracie', 'agents.direction_id', 'agents.date_naiss', 'agents.id as Id',
                  'directions.nom_direction','directions.id as ID')
                  ->orderBY('actions.risque','ASC')
                  ->get();
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.voir_action_dg', compact('actions','directions','headers'));
    } 

    public function filter_action_dg(Request $request){
        $search_action = $request->get('search_action');
        $directions = Direction::all();
          
          $actions = DB::table('directions')
          ->join('agents', 'agents.direction_id', 'directions.id')
          ->join('actions', 'actions.agent_id', 'agents.id')
          ->select('actions.id',
                  'actions.libelle', 'actions.responsable', 'actions.bakup', 'actions.raison','actions.deadline',
                  'actions.risque','actions.delais', 'actions.visibilite','actions.created_at', 'actions.updated_at', 'actions.pourcentage', 'actions.note',
                  'agents.prenom', 'agents.nom', 'agents.photo','agents.niveau_hieracie', 'agents.direction_id', 'agents.date_naiss', 'agents.id as Id',
                  'directions.nom_direction','directions.id as ID')
                  ->where('directions.nom_direction', 'like', '%'.$search_action.'%')
                  ->orderBY('actions.risque','ASC')
                  ->get();
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
        return view('action/v2.voir_action_dg', compact('actions','action_directions','directions','headers'));
      }  

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_dg()
    {
        //
        $agents = Agent::all();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();

        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_action_dg', compact('agents','reunions','res_agents','headers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionDG(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))
        
        // ->orWhere(function($query)
            //{
                //$query->where('services.nom_service', '=', 'Directeur Génerale')
                      //->where('services.nom_service', '=','Responsable Marketing')
                      //->where('services.nom_service',  '=','Responsable Stratégique');
            //})
        //->orwhere('services.nom_service', 'Directeur Génerale')
        //->orwhere('services.nom_service', 'Responsable Marketing')
        //->orwhere('services.nom_service', 'Responsable Stratégique')
        ->get();
        $agents = Agent::all();
        $directions = Direction::all();
        $indicateurs = Indicateur::all();
        $users = User::all();
        
        $reunions = Reunion::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('cameg/action.ajouter', compact('agents','reunions','res_agents','headers','directions','indicateurs','users'));

    }


public function showDirection(Request $request,$id)
    {
  //
        //$agents = Agent::all();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->get();
        $agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.direction_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction','directions.nom_direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->join('directions', 'directions.id', 'agents.direction_id')
        //->whereIn('directions.nom_direction', array('Direction Technique' ,'Direction Génerale','Direction Marketing','Direction Stratégique'))
        
              ->get();
        $reunions = Reunion::all();
        $directions = Direction::all();
        $direction = Direction::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action.ajouter', compact('agents','direction','reunions','res_agents','directions','headers'));
  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id');
            $action->date_action = $request->get('date_action');
            $action->direction_id = $request->get('direction_id'); 
            $action->indicateur_id = $request->get('indicateur_id'); 
            $action->user_id = $request->get('user_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $action = Action::find($id);
        
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))
        
        // ->orWhere(function($query)
            //{
                //$query->where('services.nom_service', '=', 'Directeur Génerale')
                      //->where('services.nom_service', '=','Responsable Marketing')
                      //->where('services.nom_service',  '=','Responsable Stratégique');
            //})
        //->orwhere('services.nom_service', 'Directeur Génerale')
        //->orwhere('services.nom_service', 'Responsable Marketing')
        //->orwhere('services.nom_service', 'Responsable Stratégique')
        
        ->get();
        $agents = Agent::all();
        $directions = Direction::all();
        $indicateurs = Indicateur::all();
        $users = User::all();
        $reunions = Reunion::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('cameg/action.edite', compact('agents','reunions', 'action','res_agents','headers','directions','indicateurs','users'));

    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $message = "Action mise à jour avec succès ! ";
         $message = "Action mise à jour avec succès ! ";
       /*  $action = Action::find($id);
        $actionUpdate = $request->all();
        $action->update($actionUpdate); */

            $action = Action::find($id);
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque');   
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage'); 
            $action->agent_id = $request->get('agent_id'); 
            $action->date_action = $request->get('date_action');
            $action->direction_id = $request->get('direction_id'); 
            $action->indicateur_id = $request->get('indicateur_id'); 
            $action->user_id = $request->get('user_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            $action->update();

        return redirect('/actions')->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $action = Action::find($id);
        $action->delete();

        return back();
    }
    
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_asigneRES()
    {
        //
         $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->where('agents.direction_id', '=', $asigne->direction_id)->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_action_asigneRES', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAsigneRES(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_asigneRAP()
    {
        $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->where('agents.direction_id', '=', $asigne->direction_id)->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_action_asigneRAP', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAsigneRAP(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_asignerespon()
    {
        //
         $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_action_asignerespon', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAsignerespon(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_asigneresponRAP()
    {
        $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_action_asigneresponRAP', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAsigneresponRAP(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_user_moi()
    {
        $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        // foreach($asignes as $asigne)
        // {
        $agents = DB::table('agents')->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id','agents.direction_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        // }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_user_moi', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAuser_moi(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return redirect('admin/dashboard/user')->with(['message' => $message]);

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_rap_moi()
    {
        $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_rap_moi', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionArap_moi(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_responsable_moi()
    {
        $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_responsable_moi', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAresponsable_moi(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_action_dg_moi()
    {
        $asignes = DB::table('agents')->where('user_id', Auth::user()->id)->get();
         //->select('agents.id','agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->get();
        foreach($asignes as $asigne)
        {
        $agents = DB::table('agents')->get();
        $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'services.nom_service','services.direction')
        ->join('services', 'services.id', 'agents.service_id')
        ->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))        
        ->get();
        }
        $reunions = Reunion::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('action/v2.ajout_dg_moi', compact('agents','reunions','res_agents','headers','asignes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_actionAdg_moi(Request $request)
    {
        request()->validate([
            'libelle' => 'required|string|max:255',
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Action ajoutée avec succès";
            $action = new Action;
            $action->libelle = $request->get('libelle');
            $action->deadline = $request->get('deadline'); 
            $action->visibilite = $request->get('visibilite');
            $action->note = $request->get('note');
            $action->risque = $request->get('risque'); 
            $action->delais = $request->get('delais'); 
            $action->reunion = $request->get('reunion');
            $action->responsable = $request->get('responsable');
            $action->bakup = $request->get('bakup');
            $action->agent = $request->get('agent');
            $action->pourcentage = $request->get('pourcentage');
            $action->agent_id = $request->get('agent_id'); 
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            
            if($action->save()){
                error_log('la création a réussi');
                $suivi_action = new Suivi_action;
                $suivi_action->deadline = $request->get('deadline');
                $suivi_action->pourcentage = $request->get('pourcentage'); 
                $suivi_action->note = $request->get('note');
                $suivi_action->delais = $request->get('delais');
                $suivi_action->action = $request->get('action');
                $suivi_action->action_id = $request->get('action_id');  
                $suivi_action->action_id = $action->id;
                $suivi_action->save();
            }
            return back()->with(['message' => $message]);

    }
    
    
    /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_action()
    {
        //
        $indicateurss = Indicateur::all();
         
         $indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage','indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          ->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          ->get();
          
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
         $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->get();
          
         $resultats = Objectif::all();
         $directions = Direction::all();
        
        return view('cameg/action.list_dg', compact('headers','indicateurss','directions','resultats','actions'));
    }

      public function stra_dg_filter(Request $request){
        $search_act_stra = $request->get('search_act_stra');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
         

                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          
           /*$actions = DB::table('indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action','actions.date_action','actions.deadline','actions.status')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('objectifs.libelle', 'like', '%'.$search_act_stra.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();  */  
          
          $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('objectifs.libelle', 'like', '%'.$search_act_stra.'%')
          ->orderBY('indicateurs.created_at','ASC')
          ->get();
                  
                  
        return view('cameg/action.list_dg', compact('objectifs','headers','indicateurss','objectifs','resultats','directions','actions'));
      }    
      
       public function in_dg_filter(Request $request){
        $search_act_in = $request->get('search_act_in');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
         
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          
           /*$actions = DB::table('indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action','actions.date_action','actions.deadline','actions.status')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('indicateurs.libelle', 'like', '%'.$search_act_in.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get(); */   
          
          $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('indicateurs.libelle', 'like', '%'.$search_act_in.'%')
          ->orderBY('indicateurs.created_at','ASC')
          ->get();
                  
                  
        return view('cameg/action.list_dg', compact('objectifs','headers','indicateurss','objectifs','resultats','directions','actions'));
      }    
      
      
      public function list_action_dir()
    {
        //
        $indicateurss = Indicateur::all();
         
         $indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution','indicateurs.updated_at',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          ->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          ->get();
          
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        $user_actions = Agent::where('user_id', Auth::user()->id)->get();
       foreach($user_actions as $user)
       {
          
          $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('agents.direction_id' ,'=', $user->direction_id)
          ->orderBY('indicateurs.created_at','ASC')
          ->get();
       }  
         $resultats = Objectif::all();
         $directions = Direction::all();
        
        return view('cameg/action.list_dir', compact('headers','indicateurss','directions','resultats','actions','user_actions'));
    }
    
     public function DirS_filter(Request $request){
        $search_act_stra = $request->get('search_act_stra');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
         

                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          $user_actions = Agent::where('user_id', Auth::user()->id)->get();
    foreach($user_actions as $user)
       {
          /* $actions = DB::table('indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage','indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action','actions.date_action','actions.deadline','actions.status','agents.direction_id')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('agents.direction_id' ,'=', $user->direction_id)
          ->where('objectifs.libelle', 'like', '%'.$search_act_stra.'%')
          ->orderBY('indicateurs.created_at','ASC')
          ->get();  */
          
          $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('agents.direction_id' ,'=', $user->direction_id)
          ->where('objectifs.libelle', 'like', '%'.$search_act_stra.'%')
          ->orderBY('indicateurs.created_at','ASC')
          ->get();
       }        
                  
        return view('cameg/action.list_dir', compact('objectifs','headers','indicateurss','objectifs','resultats','directions','actions','user_actions'));
      }    
      
      
        public function list_action_ag()
    {
        //
        $indicateurss = Indicateur::all();
         
         $indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage','indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          ->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          ->get();
          
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
         /*$actions = DB::table('indicateurs')->select(
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('agents.id', Auth::user()->id)
          ->get();*/
          
          $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
         ->where('agents.id', Auth::user()->id)
          //->where('agents.direction_id' ,'=', $user->direction_id)
         // ->where('objectifs.libelle', 'like', '%'.$search_act_stra.'%')
          //->orderBY('indicateurs.created_at','ASC')
          ->get();
          
         $resultats = Objectif::all();
         $directions = Direction::all();
        
        return view('cameg/agent.action', compact('headers','indicateurss','directions','resultats','actions'));
    }
    
     public function AG_filter(Request $request){
        $search_AG = $request->get('search_AG');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
         

                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          
           /*$actions = DB::table('indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action','actions.date_action','actions.deadline','actions.status')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('objectifs.libelle', 'like', '%'.$search_AG.'%')
          ->where('indicateurs.agent_id', Auth::user()->id)
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();  */
          
          $actions = DB::table('actions')->select(
          'actions.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom','actions.libelle as action',
          'actions.date_action','actions.deadline','actions.status')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
         ->where('agents.id', Auth::user()->id)
         ->where('objectifs.libelle', 'like', '%'.$search_AG.'%')
          ->get();
                  
                  
        return view('cameg/agent.action', compact('objectifs','headers','indicateurss','objectifs','resultats','directions','actions'));
      }    
      
              /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action_ter(Request $request, $id)
    {
        //    
        $message = "Action terminee avec success";
        $action = Action::findOrFail($id);
        $action->status = 1;
        //$action->raison = $request->get('raison');
        $action->save();
        return redirect()->back()->with(['message' => $message]); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action_non_ter(Request $request, $id)
    {
        //    
        $message = "Action terminee avec success";
        $action = Action::findOrFail($id);
        $action->status = 0;
        //$action->raison = $request->get('raison');
        $action->save();
        return redirect()->back()->with(['message' => $message]); 
    }
    


}

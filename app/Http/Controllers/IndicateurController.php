<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicateur;
use App\Suivi_indicateur;
use App\Objectif;
use App\Direction;
use App\Agent;
use DB;
use Auth;
use App\User;
use Session;

class IndicateurController extends Controller
{
    /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $indicateurs = Indicateur::all();
        $indicateurs = DB::table('indicateurs')->select('indicateurs.*')
        //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
        ->get();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('cameg/indicateur.lister', compact('indicateurs','headers'));
    }
    
     /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_indicateurs()
    {
        //
        $indicateurss = Indicateur::all();
         
         /*$indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          ->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          ->get();*/
          
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
         $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur','indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as axe')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('indicateurs.cle', '=', 1)
          ->get();
          
          $indicateurs_t = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur','indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as axe')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          //->where('indicateurs.cle', '=', 1)
          ->get();
          
         $resultats = Objectif::all();
         $directions = Direction::all();
        
        return view('cameg/indicateur.list', compact('indicateurs','headers','indicateurss','directions','resultats','indicateurs_t'));
    }

      public function stra_dg_filter(Request $request){
        $search_in_dgstr = $request->get('search_in_dgstr');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
         
          /*$indicateurs = DB::table('indicateurs')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
         ->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.created_at')
                  ->where('indicateurs.libelle', 'like', '%'.$search_in_dgstr.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();*/
                  
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
          
          $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent','indicateurs.created_at', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('objectifs.libelle', 'like', '%'.$search_in_dgstr.'%')
          //->where('indicateurs.cle', '=', 1)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();      
          
          $indicateurs_t = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('objectifs.libelle', 'like', '%'.$search_in_dgstr.'%')
          //->where('indicateurs.cle', '=', 1)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();      
                  
                  
        return view('cameg/indicateur.list', compact('objectifs','headers','indicateurs','indicateurss','objectifs','resultats','directions','indicateurs_t'));
      }    
      
       public function dir_dg_filter(Request $request){
        $search_in_dgdir = $request->get('search_in_dgdir');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
         
          /*$indicateurs = DB::table('indicateurs')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
         ->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.created_at')
                  ->where('indicateurs.libelle', 'like', '%'.$search_in_dgstr.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();*/
                  
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
          
           $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at','indicateurs.created_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('directions.nom_direction', 'like', '%'.$search_in_dgdir.'%')
          //->where('indicateurs.cle', '=', 1)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();         
          
          $indicateurs_t = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at','indicateurs.created_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('directions.nom_direction', 'like', '%'.$search_in_dgdir.'%')
          //->where('indicateurs.cle', '=', 1)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();          
                  
                  
        return view('cameg/indicateur.list', compact('objectifs','headers','indicateurs','indicateurss','objectifs','resultats','directions','indicateurs_t'));
      }    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        $directions = Direction::all();
        $objectifs = Objectif::all();
        $agents = Agent::all();
        return view('cameg/indicateur.ajouter', compact('headers','directions','agents','objectifs'));

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

    ]);
            $message = "Ajouté avec succès";

            $indicateur = new Indicateur;
            $indicateur->libelle = $request->get('libelle');
            $indicateur->cible = $request->get('cible'); 
            $indicateur->pourcentage = $request->get('pourcentage'); 
            $indicateur->date_cible = $request->get('date_cible');
            $indicateur->compare = $request->get('compare');
            $indicateur->valeur_prec = $request->get('valeur_prec');
            $indicateur->valeur_act = $request->get('valeur_act');
            $indicateur->frequence = $request->get('frequence');
            $indicateur->direction_id = $request->get('direction_id');
            $indicateur->agent_id = $request->get('agent_id');
            $indicateur->superieur_id = $request->get('superieur_id');
            $indicateur->cle = $request->get('cle');
            //$indicateur->save();
            if($indicateur->save()){  

            $suivi_indicateur = new Suivi_indicateur;
            $suivi_indicateur->date = $request->get('date');
            $suivi_indicateur->pourcentage = $request->get('pourcentage'); 
            $suivi_indicateur->note = $request->get('note');
            $suivi_indicateur->indicateur = $request->get('indicateur');
            $suivi_indicateur->indicateur_id = $request->get('indicateur_id');
            $suivi_indicateur->agent_id = $request->get('agent_id');
            $suivi_indicateur->valeur_prec = $request->get('valeur_prec');
            $suivi_indicateur->valeur_act = $indicateur->id;
            $suivi_indicateur->date_maj = $request->get('date_maj');
            $suivi_indicateur->save();

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
        $indicateur = Indicateur::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        $directions = Direction::all();
        $objectifs = Objectif::all();
        $agents = Agent::all();
        return view('cameg/indicateur.edite', compact('headers','directions','agents','objectifs','indicateur'));


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

        $message = "Indicateur modifé avec succé";
            $indicateur = Indicateur::find($id);
            $indicateur->libelle = $request->get('libelle');
            $indicateur->cible = $request->get('cible'); 
            $indicateur->pourcentage = $request->get('pourcentage'); 
            $indicateur->date_cible = $request->get('date_cible');
            $indicateur->compare = $request->get('compare');
            $indicateur->valeur_prec = $request->get('valeur_prec');
            $indicateur->valeur_act = $request->get('valeur_act');
            $indicateur->frequence = $request->get('frequence');
            $indicateur->direction_id = $request->get('direction_id');
            $indicateur->agent_id = $request->get('agent_id');
            $indicateur->superieur_id = $request->get('superieur_id');
            $indicateur->cle = $request->get('cle');
        $indicateur->update();
        //$indicateurUpdate = $request->all();
        //$indicateur->update($indicateurUpdate);

        return redirect('/indicateurs')->with(['message' => $message]);
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
        $indicateur = Indicateur::find($id);
        $indicateur->delete();

        return back();
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cle(Request $request, $id)
    {
        //    
        $message = "Indicateur cle actif";
        $action = Indicateur::findOrFail($id);
        $action->cle = 1;
        //$action->raison = $request->get('raison');
        $action->save();
        return redirect()->back()->with(['message' => $message]); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function non_cle(Request $request, $id)
    {
        //    
        $message = "Indicateur non cle actif";
        $action = Indicateur::findOrFail($id);
        $action->cle = 0;
        //$action->raison = $request->get('raison');
        $action->save();
        return redirect()->back()->with(['message' => $message]); 
    }
    
         /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_tous_indicateurs()
    {
        //
        $indicateurss = Indicateur::all();
         
         /*$indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          ->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          ->get();*/
          
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
         $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur','indicateurs.updated_at','indicateurs.created_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as axe')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('indicateurs.cle', '=', 1)
          ->get();
          
          $indicateurs_t = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at','indicateurs.created_at',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
          'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          //->where('indicateurs.cle', '=', 1)
          ->get();
          $results =DB::table('objectifs')
            ->join('axes', 'axes.id', 'objectifs.axe_id')
            ->select('objectifs.id', 'objectifs.libelle',
             'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
              'axes.libelle as axe')
            ->get();
            
            $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {
             
            /*$results_globals = DB::table('objectifs')
            ->join('axes', 'axes.id', 'objectifs.axe_id')
            ->select('objectifs.id', 'objectifs.libelle',
             'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
              'axes.libelle as axe')
            ->get();*/
           
            
            $indicateurs_sum = DB::table('indicateurs')->select(
            'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at','indicateurs.created_at',
            'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
            'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
            //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
            ->join('directions', 'directions.id', 'indicateurs.direction_id')
            ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
            ->where('indicateurs.objectif_id', '=', $resul->id)
            ->sum('indicateurs.pourcentage');
            
            $indicateurs_global = DB::table('indicateurs')->select(
            'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at','indicateurs.created_at',
            'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
            'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
            //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
            ->join('directions', 'directions.id', 'indicateurs.direction_id')
            ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
            ->where('indicateurs.objectif_id', '=', $resul->id)
            //->sum('indicateurs.pourcentage');
            ->get();
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = $indicateurs_sum / $count;
             array_push($sum_array,$sum);
          }
          
          
          
          //$sum = $indicateurs_ts->sum('indicateurs.pourcentage');
          //dd($sum_array);
         $resultats = Objectif::all();
         $directions = Direction::all();
        
        return view('cameg/indicateur.list_tous_indicateurs', compact('indicateurs','indicateurs_sum','indicateurs_global','indi_array','count_array','sum_array','results','headers','indicateurss','directions','resultats','indicateurs_t'));
    }

    

}

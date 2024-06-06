<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objectif;
use App\Direction;
use App\Action;
use App\Indicateur;
use App\Suivi_indicateur;
use App\Reunion;
use App\Historie;
use App\Agent;
use App\Axe;
use DB;
use Auth;
use App\User;
use Session;

class ObjectifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$objectifs = objectif::all();

        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline', 'objectifs.axe_id',  'objectifs.pourcentage'
          )
          //->join('directions', 'directions.id', 'objectifs.direction_id')
          //->join('axes', 'axes.id', 'objectifs.axe_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
         $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {
            $indicateurs_sum = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')

            ->get();
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = $indicateurs_sum / $count;
             array_push($sum_array,$sum);
          }

        return view('cameg/object.lister', compact('objectifs','headers','sum_array'));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_objectifs()
    {
        //
        //$objectifs = objectif::all();
        $directionss = Direction::all();
        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline', 'objectifs.axe_id',  'objectifs.pourcentage',
          'directions.nom_direction','axes.libelle')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('axes', 'axes.id', 'objectifs.axe_id')
          ->get();
          $directions = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline', 'objectifs.axe_id',  'objectifs.pourcentage',
          'directions.nom_direction','axes.libelle')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('axes', 'axes.id', 'objectifs.axe_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        $axes = Axe::all();
        
        $resultats = DB::table('objectifs')
          //->join('axes', 'axes.id', 'objectifs.axe_id')
          ->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage')
           ->get();
        
            $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {
            $indicateurs_sum = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')

            ->get();
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = $indicateurs_sum / $count;
             array_push($sum_array,$sum);
          }
        return view('cameg/objectif.dg_list', compact('objectifs','headers','directionss','directions','axes','resultats','sum_array'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dgs_filter(Request $request)
    {
        //
        //$objectifs = objectif::all();
        $search_dg_axe = $request->get('search_dg_axe');
        $directionss = Direction::all();
        $axes = Axe::all();
        
        $resultats = DB::table('objectifs')
          ->join('axes', 'axes.id', 'objectifs.axe_id')
          //->join('objectifs', 'objectifs.axe_id', 'axes.id')
          ->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
          'axes.libelle as axe')
          ->where('axes.libelle', 'like', '%'.$search_dg_axe.'%')
          ->orderBY('objectifs.created_at','ASC')
           ->get();
           
           
          $directions = DB::table('axes')
          //->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('objectifs', 'objectifs.axe_id', 'axes.id')
          ->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
          'axes.libelle')
          ->where('axes.libelle', 'like', '%'.$search_dg_axe.'%')
                  ->orderBY('objectifs.created_at','ASC')
          ->get();
          
        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
          'directions.nom_direction','axes.libelle')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('axes', 'axes.id', 'objectifs.axe_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);

        return view('cameg/objectif.dg_list', compact('objectifs','headers','directions','directionss','axes','resultats'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        $agents = Agent::all();
        $directions = Direction::all();
        $axes = Axe::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('cameg/object.ajouter', compact('agents','directions','headers','axes'));

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
            $message = "Résultat stratégique ajouté avec succès";

            $objectif = new Objectif;
            $objectif->libelle = $request->get('libelle');
            $objectif->deadline = $request->get('deadline'); 
            $objectif->pourcentage = $request->get('pourcentage');
            $objectif->direction_id = $request->get('direction_id');
            $objectif->axe_id = $request->get('axe_id');
            //$objectif->reunion_id = $request->get('reunion_id'); 
            $objectif->save();

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
        $objectif = objectif::find($id);
        $agents = Agent::all();
        $directions = Direction::all();
        $axes = Axe::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('cameg/object.edite', compact('agents','directions', 'objectif','headers','axes'));

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

        $message = "Résultat stratégique modifié avec succés";
        $objectif = Objectif::find($id);
        $objectif->libelle = $request->get('libelle');
        $objectif->deadline = $request->get('deadline'); 
        $objectif->pourcentage = $request->get('pourcentage');
        $objectif->direction_id = $request->get('direction_id');
        $objectif->axe_id = $request->get('axe_id');
        //$objectifUpdate = $request->all();
        $objectif->update();

        return redirect('/liste_objectif')->with(['message' => $message]);
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
        $objectif = objectif::find($id);
        $objectif->delete();

        return back();
    }
    
    
    public function dg()
    {
        //
        
         $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
           ->paginate(2);
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
       
        
        $count_axes =DB::table('objectifs')
            ->join('axes', 'axes.id', 'objectifs.axe_id')
            ->select('objectifs.id', 'objectifs.libelle',
             'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
              'axes.libelle as axe')
        ->count();
        
        
         $indicateurss = Indicateur::all();
         
          $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as axe')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('indicateurs.cle', '=', 1)
          ->get();
          
         $resultats = Objectif::all();
         $directions = Direction::all();
         
         $results =DB::table('objectifs')
            //->join('axes', 'axes.id', 'objectifs.axe_id')
            ->select('objectifs.id', 'objectifs.libelle',
             'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage'
              )
            ->get();
         
          $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {

            
            $indicateurs_sum = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')

            ->get();
           
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = ($indicateurs_sum / $count);
             
             //if($indicateurs_sum != 0)     
             //$sum = $indicateurs_sum / $count;  
            //else     
                //$indicateurs_sum = 0;
             
             array_push($sum_array,$sum);
             
             //array_sum (array, $sum_array) : int|float;
             
             $sum_total = array_sum($sum_array);
             $counts = count($sum_array);

          }
         $perfo_global = $sum_total / $counts;
         //dd($sum_total);
         //dd($perfo_global);
        //dd($sum_array);
        
        $direction_id = DB::table('directions')
            ->select('directions.id')
            ->get();
            
          $indi_array_dir = array();
          $sum_array_dir = array();
          $count_array_dir = array();
          
          foreach($direction_id as $dir)
          {
            //$indicateurs_sum_dir = DB::table('indicateurs')->select(
            //'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
            //'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
            //'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
            //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
            //->join('directions', 'directions.id', 'indicateurs.direction_id')
            //->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
            //->where('indicateurs.direction_id', '=', $dir->id)
            //->orWhereNull('indicateurs.direction_id')
            //->sum('indicateurs.pourcentage');
            
            //$indicateurs_global_dir = DB::table('indicateurs')->select(
            //'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
            //'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
            //'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
            //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
            //->join('directions', 'directions.id', 'indicateurs.direction_id')
            //->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
            //->where('indicateurs.direction_id', '=', $dir->id)
            //->orWhereNull('indicateurs.direction_id')
            //->sum('indicateurs.pourcentage');
            //->get();
            
            $indicateurs_sum_dir = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.direction_id', '=', $dir->id)
            ->orWhereNull('indicateurs.direction_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global_dir = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.direction_id', '=', $dir->id)
            ->orWhereNull('indicateurs.direction_id')

            ->get();
            
            $count_dir = count($indicateurs_global_dir); 
            array_push($indi_array_dir, $indicateurs_global_dir);
            
             $sum_dir = $indicateurs_sum_dir / $count_dir;
             array_push($sum_array_dir,$sum_dir);
             
             //array_sum (array, $sum_array) : int|float;
             
             $sum_total_dir = array_sum($sum_array_dir);
             $counts_dir = count($sum_array_dir);

          }
         $taux_exe = $sum_total_dir / $counts_dir;
         
        //dd($sum_total_dir);
        //dd($taux_exe);
        //dd($sum_array_dir);
        
        return view('cameg.dg', compact('objectifs','headers','indicateurs','indicateurss',
        'resultats','directions','sum_array','results','perfo_global','taux_exe'));
    }
    
     public function stra_dg_filter(Request $request){
        $search_stra_dg = $request->get('search_stra_dg');
       // $search_dir_dg = $request->get('search_dir_dg');
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
                  ->where('indicateurs.libelle', 'like', '%'.$search_stra.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);*/
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
        $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at','indicateurs.created_at',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('objectifs.libelle', 'like', '%'.$search_stra_dg.'%')
          //->where('indicateurs.cle', '=', 0)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();          
                  
          $axes = DB::table('axes')
          //->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('objectifs', 'objectifs.axe_id', 'axes.id')
          ->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
          'axes.libelle as axe')
          //->where('axes.libelle', 'like', '%'.$search_obs.'%')
                  //->orderBY('objectifs.created_at','ASC')
           ->get();
           
         $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
                  
        return view('cameg.dg', compact('objectifs','headers','indicateurs','indicateurss','objectifs','axes','resultats','directions'));
      }    
      
      
       public function dir_dg_filter(Request $request){
        //$search_stra_dg = $request->get('search_stra_dg');
        $search_dir_dg = $request->get('search_dir_dg');
        $indicateurss = Indicateur::all();
        
         $resultats = Objectif::all();
         $directions = Direction::all();
  
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
            ->where('user_id', Auth::user()->id)
            ->join('directions', 'directions.id', 'agents.direction_id')
            ->paginate(1);
        $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at','indicateurs.created_at',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          //->where('objectifs.libelle', 'like', '%'.$search_stra_dg.'%')
          ->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
          //->where('indicateurs.cle', '=', 1)
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();          
                  
          $axes = DB::table('axes')
          //->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('objectifs', 'objectifs.axe_id', 'axes.id')
          ->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
          'axes.libelle as axe')
          //->where('axes.libelle', 'like', '%'.$search_obs.'%')
                  //->orderBY('objectifs.created_at','ASC')
           ->get();
           
         $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
                  
        return view('cameg.dg', compact('objectifs','headers','indicateurs','indicateurss','objectifs','axes','resultats','directions'));
      }    
      
      
      public function dir()
    {
        //
        
        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
        
        //$indicateur = Indicateur::all();
         $indicateurss = Indicateur::all();
         
          $resultats = Objectif::all();
          $user_actions = Agent::where('user_id', Auth::user()->id)->get();
            foreach($user_actions as $user)
               {
                $indicateurs = DB::table('indicateurs')->select(
                 'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
                  'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
                  'directions.nom_direction as direction','objectifs.libelle as stra','agents.direction_id')
                  //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
                  ->join('directions', 'directions.id', 'indicateurs.direction_id')
                  ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
                  ->join('agents', 'agents.id', 'indicateurs.agent_id')
                  ->where('directions.id' ,'=', $user->direction_id)
                  ->get();
                  
                $indicateurs_ma = DB::table('indicateurs')->select(
                 'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
                  'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
                  'directions.nom_direction as direction','objectifs.libelle as stra','agents.direction_id')
                  //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
                  ->join('directions', 'directions.id', 'indicateurs.direction_id')
                  ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
                  ->join('agents', 'agents.id', 'indicateurs.agent_id')
                  ->where('directions.id' ,'=', $user->direction_id)
                  ->count();
                  $indicateurs_maa = DB::table('indicateurs')->select(
                 'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
                  'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
                  'directions.nom_direction as direction','objectifs.libelle as stra','agents.direction_id')
                  //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
                  ->join('directions', 'directions.id', 'indicateurs.direction_id')
                  ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
                  ->join('agents', 'agents.id', 'indicateurs.agent_id')
                  ->where('directions.id' ,'=', $user->direction_id)
                  ->sum('indicateurs.pourcentage');
               }
            $perfo_de_ma = $indicateurs_maa / $indicateurs_ma; 
             //dd($perfo_de_ma);
            $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {
            $indicateurs_sum = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')

            ->get();
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = $indicateurs_sum / $count;
             array_push($sum_array,$sum);
             
             //array_sum (array, $sum_array) : int|float;
             
             $sum_total = array_sum($sum_array);
             $counts = count($sum_array);

          }
         $perfo_global = $sum_total / $counts;
         //dd($sum_total);
         //dd($perfo_global);
        //dd($sum_array);
            $direction_id = DB::table('directions')
            ->select('directions.id')
            ->get();
            
          $indi_array_dir = array();
          $sum_array_dir = array();
          $count_array_dir = array();
          
          foreach($direction_id as $dir)
          {
            //$indicateurs_sum_dir = DB::table('indicateurs')->select(
            //'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
            //'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
            //'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
            //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
            //->join('directions', 'directions.id', 'indicateurs.direction_id')
            //->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
            //->where('indicateurs.direction_id', '=', $dir->id)
            //->sum('indicateurs.pourcentage');
            
            //$indicateurs_global_dir = DB::table('indicateurs')->select(
            //'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
            //'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.objectif_id as resultat','indicateurs.cle','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible',
            //'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.id as inID','objectifs.id as resID')
            //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
            //->join('directions', 'directions.id', 'indicateurs.direction_id')
            //->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
            //->where('indicateurs.direction_id', '=', $dir->id)
            //->sum('indicateurs.pourcentage');
            //->get();
            
            $indicateurs_sum_dir = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.direction_id', '=', $dir->id)
             ->orWhereNull('indicateurs.direction_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global_dir = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.direction_id', '=', $dir->id)
             ->orWhereNull('indicateurs.direction_id')
            ->get();
            
            $count_dir = count($indicateurs_global_dir); 
            array_push($indi_array_dir, $indicateurs_global_dir);
            
             $sum_dir = $indicateurs_sum_dir / $count_dir;
             array_push($sum_array_dir,$sum_dir);
             
             //array_sum (array, $sum_array) : int|float;
             
             $sum_total_dir = array_sum($sum_array_dir);
             $counts_dir = count($sum_array_dir);

          }
         $taux_exe = $sum_total_dir / $counts_dir;
         
                return view('cameg.directeur', compact('objectifs','headers','indicateurs','taux_exe',
                'indicateurss','resultats','user_actions','perfo_de_ma','perfo_global'));
    }
    
     public function dir_filter(Request $request){
        $search_dir = $request->get('search_dir');
        $indicateurss = Indicateur::all();
        

          /*$indicateurs = DB::table('indicateurs')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
         ->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.created_at')
                  ->where('indicateurs.libelle', 'like', '%'.$search_dir.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();*/
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  $resultats = Objectif::all();
            $user_actions = Agent::where('user_id', Auth::user()->id)->get();
            foreach($user_actions as $user)
               {
            $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at','indicateurs.created_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.direction_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
         ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('directions.id' ,'=', $user->direction_id)
          ->where('objectifs.libelle', 'like', '%'.$search_dir.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();
            }     
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
                  
        return view('cameg.directeur', compact('objectifs','headers','indicateurs','indicateurss','objectifs','resultats','user_actions'));
      }    
    
    
    public function adm()
    {
        //
        
        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          //->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        //$indicateur = Indicateur::all();
         $indicateurss = Indicateur::all();
         
         //$indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         //'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         //'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         //'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage','indicateurs.updated_at',
          //'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          //->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          //->get();
          
         $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.cle',
          'indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at'
         )
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          //->join('directions', 'directions.id', 'indicateurs.direction_id')
          //->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          //->where('indicateurs.cle', '=', 1)
          ->get();
          
           $directionss = Direction::all();
          $directions =DB::table('axes')
          //->join('directions', 'directions.id', 'objectifs.direction_id')
          ->join('objectifs', 'objectifs.axe_id', 'axes.id')
          ->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline','objectifs.created_at','objectifs.axe_id',  'objectifs.pourcentage',
          'axes.libelle as axe')
          //->where('axes.libelle', 'like', '%'.$search_obs.'%')
                  //->orderBY('objectifs.created_at','ASC')
           ->get();
           
            $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            //dd($results_id);
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {

            
            $indicateurs_sum = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')

            ->get();
           
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = ($indicateurs_sum / $count);
             
             //if($indicateurs_sum != 0)     
             //$sum = $indicateurs_sum / $count;  
            //else     
                //$indicateurs_sum = 0;
             
             array_push($sum_array,$sum);
             
             //array_sum (array, $sum_array) : int|float;
             
             $sum_total = array_sum($sum_array);
             $counts = count($sum_array);

          }
         $perfo_global = $sum_total / $counts;
         //dd($sum_total);
         //dd($perfo_global);
        //dd($sum_array);
        
        return view('cameg.admin', compact('objectifs','headers','indicateurs','indicateurss','directionss','directions','sum_array','results_id'));
    }
    
     public function adm_filter(Request $request){
        $search_adm = $request->get('search_adm');
        $indicateurss = Indicateur::all();
        

          $indicateurs = DB::table('indicateurs')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          //->join('actions', 'actions.agent_id', 'agents.id')
          //->leftjoin('suivi_actions', 'suivi_actions.action_id', 'actions.id')
         ->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 'indicateurs.updated_at',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.created_at')
                  ->where('indicateurs.libelle', 'like', '%'.$search_adm.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();
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
          
           $directionss = Direction::all();
          $directions = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
                  
        return view('cameg.admin', compact('objectifs','headers','indicateurs','indicateurss','objectifs','directionss','directions'));
      }    
    
    
       
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_act_ind($id)
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
        $indicateur = Indicateur::find($id);
        $directions = Direction::all();
        
         $res_agents = DB::table('agents')
        ->select('agents.prenom', 'agents.nom', 'agents.photo', 'agents.service_id', 'agents.date_naiss', 'agents.id',
        'indicateurs.direction_id')
        ->join('indicateurs', 'indicateurs.agent_id', 'agents.id')
        // ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
        //->whereIn('agents.niveau_hieracie', array('Directeur' ,'Chef de Service'))    
        ->where('indicateurs.direction_id', '=', $indicateur->direction_id)
        ->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/action.ajout_act', compact('agents','reunions','res_agents','headers','indicateur','directions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_act_inds(Request $request)
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
            $action->indicateur_id = $request->get('indicateur_id');
            $action->date_action = $request->get('date_action_id');
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            $action->save();
           /* if($action->save()){
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
            }*/
            return back()->with(['message' => $message]);

    }
    
    
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_act_list()
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/action.ajout_act_list', compact('agents','reunions','res_agents','headers','indicateurs','directions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_act_lists(Request $request)
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
            $action->indicateur_id = $request->get('indicateur_id');
            $action->date_action = $request->get('date_action_id');
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            $action->save();
           /* if($action->save()){
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
            }*/
            return redirect('/list_actions')->with(['message' => $message]);

    }
    
    
          /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout_act_list_dir()
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/action.ajout_act_list_dir', compact('agents','reunions','res_agents','headers','indicateurs','directions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajout_act_lists_dir(Request $request)
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
            $action->indicateur_id = $request->get('indicateur_id');
            $action->date_action = $request->get('date_action_id');
            $action->reunion_id = $request->get('reunion_id');
            $action->raison = $request->get('raison');
            $action->save();
           /* if($action->save()){
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
            }*/
            return redirect('/list_action_dir')->with(['message' => $message]);

    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function note($id)
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        $action = Action::find($id);
        
         $histories = DB::table('histories')->select('histories.id','histories.note',
        'histories.created_at as date','histories.user_id','histories.agent_id',
        'users.prenom as preDG','users.nom as nomDG','agents.prenom as preAG','agents.nom as nomAG')
        //->where('histories.user_id', Auth::user()->id)
         ->where('histories.action_id', '=', $action->id)
         ->where('histories.agent_id', '=', $action->agent_id)
        ->join('users', 'users.id', 'histories.user_id')
        ->join('agents', 'agents.id', 'histories.agent_id')
        ->orderBy('histories.created_at', 'DESC')
        ->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/action.comment', compact('agents','reunions','res_agents','headers','indicateurs','directions','action','histories'));

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $id)
    {
        //    
        $message = "Action commentée avec succès !";
        $action = Action::findOrFail($id);
        $action->note = $request->get('note');
        //$action->save();
         if($action->save()){
             
        $historie = new Historie();
        $historie->note = $request->get('note');
        $historie->agent_id = $request->get('agent_id');
        $historie->user_id = $request->get('user_id');
        $historie->action_id = $request->get('action_id');

         if($historie->save())
                    {
                        return back()->with(['message' => $message]);

                    }
                    else
                    {
                        flash('user not saved')->error();

                    }


         }
        return redirect()->back()->with(['message' => $message]); 
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function note_dir($id)
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        $indicateur = Action::find($id);
        
         $histories = DB::table('histories')->select('histories.id','histories.note',
        'histories.created_at as date','histories.user_id','histories.agent_id',
        'users.prenom as preDG','users.nom as nomDG','agents.prenom as preAG','agents.nom as nomAG')
        //->where('histories.user_id', Auth::user()->id)
        ->where('histories.action_id', '=', $indicateur->id)
         ->where('histories.agent_id', '=', $indicateur->agent_id)
        ->join('users', 'users.id', 'histories.user_id')
        ->join('agents', 'agents.id', 'histories.agent_id')
        ->orderBy('histories.created_at', 'DESC')
        ->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/action.comment_dir', compact('agents','reunions','res_agents','headers','indicateurs','directions','indicateur','histories'));

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment_dir(Request $request, $id)
    {
        //    
        /*$message = "Action commentée";
        $action = Indicateur::findOrFail($id);
        $action->note = $request->get('note');
        $action->pourcentage = $request->get('pourcentage');
        $action->save();*/
        
        $message = "Action commentée avec succès !";
        $action = Action::findOrFail($id);
        $action->note = $request->get('note');
        //$action->save();
         if($action->save()){
             
        $historie = new Historie();
        $historie->note = $request->get('note');
        $historie->agent_id = $request->get('agent_id');
        $historie->user_id = $request->get('user_id');
        $historie->action_id = $request->get('action_id');

        
         if($historie->save())
                    {
                        return redirect('/list_indicateurs_dir')->with(['message' => $message]);

                    }
                    else
                    {
                        flash('user not saved')->error();

                    }


         }

        return redirect('/list_indicateurs_dir')->with(['message' => $message]); 
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function note_dirAct($id)
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        $indicateur = Action::find($id);
        
         $histories = DB::table('histories')->select('histories.id','histories.note',
        'histories.created_at as date','histories.user_id','histories.agent_id',
        'users.prenom as preDG','users.nom as nomDG','agents.prenom as preAG','agents.nom as nomAG')
        //->where('histories.user_id', Auth::user()->id)
        ->where('histories.action_id', '=', $indicateur->id)
         ->where('histories.agent_id', '=', $indicateur->agent_id)
        ->join('users', 'users.id', 'histories.user_id')
        ->join('agents', 'agents.id', 'histories.agent_id')
        ->orderBy('histories.created_at', 'DESC')
        ->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/action.comment_dirAct', compact('agents','reunions','res_agents','headers','indicateurs','directions','indicateur','histories'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment_dirAct(Request $request, $id)
    {
        //    
        /*$message = "Action commentée";
        $action = Indicateur::findOrFail($id);
        $action->note = $request->get('note');
        $action->pourcentage = $request->get('pourcentage');
        $action->save();*/
        
        $message = "Action commentée avec succès !";
        $action = Action::findOrFail($id);
        $action->note = $request->get('note');
        //$action->save();
         if($action->save()){
             
        $historie = new Historie();
        $historie->note = $request->get('note');
        $historie->agent_id = $request->get('agent_id');
        $historie->user_id = $request->get('user_id');
        $historie->action_id = $request->get('action_id');

        
         if($historie->save())
                    {
                        return redirect('/list_indicateurs')->with(['message' => $message]);

                    }
                    else
                    {
                        flash('user not saved')->error();

                    }


         }

        return redirect('/list_indicateurs')->with(['message' => $message]); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maj_ags($id)
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        $indicateur = Indicateur::find($id);
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/agent.maj', compact('agents','reunions','res_agents','headers','indicateurs','directions','indicateur'));

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voir_comment($id)
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        $indicateur = Action::find($id);
        
        $histories = DB::table('histories')->select('histories.id','histories.note',
        'histories.created_at as date','histories.user_id','histories.agent_id',
        'users.prenom as preDG','users.nom as nomDG','agents.prenom as preAG','agents.nom as nomAG')
        //->where('histories.user_id', Auth::user()->id)
        ->where('histories.action_id', '=', $indicateur->id)
         ->where('histories.agent_id', '=', $indicateur->agent_id)
        ->join('users', 'users.id', 'histories.user_id')
        ->join('agents', 'agents.id', 'histories.agent_id')
        ->orderBy('histories.created_at', 'DESC')
        ->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/agent.voir_comment', compact('agents','reunions','res_agents','headers','indicateurs','directions','indicateur','histories'));

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maj_ag(Request $request, $id)
    {
        //    
        $message = "Indicateur modifié avec succés";
        
        $action = Indicateur::findOrFail($id);
        //$action->note = $request->get('note');
        //$action->pourcentage = $request->get('pourcentage');
        //$action->save();
        $action->pourcentage = $request->get('pourcentage');
        $action->valeur_prec = $request->get('valeur_prec');
        $action->valeur_act = $request->get('valeur_act');
        //$action->save();
        
        if($action->save()){
             
        $suivi_indicateur = new Suivi_indicateur;
        $suivi_indicateur->pourcentage = $request->get('pourcentage'); 
        $suivi_indicateur->valeur_prec = $request->get('valeur_prec');
        $suivi_indicateur->valeur_act = $request->get('valeur_act');
        $suivi_indicateur->indicateur_id = $request->get('indicateur_id');
        $suivi_indicateur->agent_id = $request->get('agent_id');
        $suivi_indicateur->user_id = $request->get('user_id');
        //$suivi_indicateur->save();

         if($suivi_indicateur->save())
                    {
                        return redirect('/AGENT/dashboard')->with(['message' => $message]);

                    }
                    else
                    {
                        flash('user not saved')->error();

                    }


         }

        return redirect('/AGENT/dashboard')->with(['message' => $message]); 
    }
    
    
     public function action_indicateurs_edit($id)
    {
        //    
        
        $indicateur = Indicateur::find($id);
        
        /*$actions = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom',
          'actions.libelle as action','actions.date_action','actions.deadline','actions.status','actions.indicateur_id')
         // ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('actions.indicateur_id', '=', $indicateur->id)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();  */        
           $actions = DB::table('actions')->select(
          'actions.id','actions.libelle as action','actions.date_action','actions.deadline',
          'actions.status','actions.indicateur_id','agents.prenom','agents.nom')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          //->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          //->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('actions.indicateur_id', '=', $indicateur->id)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('actions.created_at','ASC')
          ->get();            
                  
        return view('cameg/action.action_indicateurs', compact('actions','indicateur'));
    }
    
    
    public function action_indicateurs_edit_dir($id)
    {
        //    
        
        $indicateur = Indicateur::find($id);
        
        /*$actions = DB::table('actions')->select(
          'actions.id','actions.libelle as action','actions.date_action','actions.deadline',
          'actions.status','actions.indicateur_id','agents.prenom','agents.nom')
          ->join('indicateurs', 'indicateurs.id', 'actions.indicateur_id')
          ->join('agents', 'agents.id', 'actions.agent_id')
          ->where('actions.indicateur_id', '=', $indicateur->id)
          ->orderBY('actions.created_at','ASC')
          ->get(); */
          
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
              ->where('actions.indicateur_id', '=', $indicateur->id)
              ->orderBY('actions.created_at','ASC')
              ->get();
           }  
                  
                  
        return view('cameg/action.action_indicateurs_dir', compact('actions','indicateur'));
    }
    
    
     public function stra_indicateurs_edit($id)
    {
        //    
        
        $axe = Objectif::find($id);
        
        $actions = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom',
          'actions.libelle as action','actions.date_action','actions.deadline','actions.status','actions.indicateur_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          //->where('actions.indicateur_id', '=', $indicateur->id)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();          
             
        $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as axe','indicateurs.objectif_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->where('indicateurs.objectif_id', '=', $axe->id)
          ->get();     
                  
        return view('cameg/indicateur.stra_indicateurs', compact('actions','axe','indicateurs'));
    }


  public function list_indicateurs_dir()
    {
        //
        
        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
        
        //$indicateur = Indicateur::all();
         $indicateurss = Indicateur::all();
         
         /*$indicateurs = DB::table('suivi_indicateurs')->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible')
          ->join('indicateurs', 'indicateurs.id', 'suivi_indicateurs.indicateur_id')
          ->get();*/
          $resultats = Objectif::all();
          $user_actions = Agent::where('user_id', Auth::user()->id)->get();
    foreach($user_actions as $user)
       {
           $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.direction_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('directions.id' ,'=', $user->direction_id)
          ->get();
       }
        return view('cameg/indicateur.list_dir', compact('objectifs','headers','indicateurs','indicateurss','resultats','user_actions'));
    }
    
     public function DirI_filter(Request $request){
        $search_DirI = $request->get('search_DirI');
        $indicateurss = Indicateur::all();
        

          /*$indicateurs = DB::table('indicateurs')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
         ->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.created_at')
                  ->where('indicateurs.libelle', 'like', '%'.$search_dir.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();*/
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  $resultats = Objectif::all();
                  
    $user_actions = Agent::where('user_id', Auth::user()->id)->get();
    foreach($user_actions as $user)
       {

            $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.direction_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('directions.id' ,'=', $user->direction_id)
          ->where('objectifs.libelle', 'like', '%'.$search_DirI.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();
       }     
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
                  
        return view('cameg/indicateur.list_dir', compact('objectifs','headers','indicateurs','indicateurss','objectifs','resultats','user_actions'));
      }    
      
      
      
      public function action_indicateurs_edit_ag($id)
    {
        //    
        
        $indicateur = Indicateur::find($id);
        
        $actions = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom',
          'actions.libelle as action','actions.date_action','actions.deadline','actions.status','actions.indicateur_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('actions.indicateur_id', '=', $indicateur->id)
          //->where('directions.nom_direction', 'like', '%'.$search_dir_dg.'%')
                  ->orderBY('indicateurs.created_at','ASC')
          ->get();          
                  
                  
        return view('cameg/agent.indi_action', compact('actions','indicateur'));
    }
    
     public function ag()
    {
        //
        
        $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        
        
        //$indicateur = Indicateur::all();
         $indicateurss = Indicateur::all();
         
         
          $resultats = Objectif::all();
        $user_actions = Agent::where('user_id', Auth::user()->id)->get();
            foreach($user_actions as $user)
               {
           $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.user_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('directions.id', '=', $user->direction_id)
          ->get();
          
          $indicateurs_ma = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.user_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('directions.id', '=', $user->direction_id)
          ->count();
          
          $indicateurs_maa = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.user_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('directions.id', '=', $user->direction_id)
          ->sum('indicateurs.pourcentage');
          
        }
        
        $perfo_de_ma = $indicateurs_maa / $indicateurs_ma; 
             //dd($perfo_de_ma);
            $results_id = DB::table('objectifs')
            ->select('objectifs.id')
            ->get();
            
          $indi_array = array();
          $sum_array = array();
          $count_array = array();
          
          foreach($results_id as $resul)
          {
            $indicateurs_sum = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')
            ->sum('indicateurs.pourcentage');
            $indicateurs_global = DB::table('indicateurs')
            ->select('indicateurs.*')
            ->where('indicateurs.objectif_id', '=', $resul->id)
             ->orWhereNull('indicateurs.objectif_id')

            ->get();
            $count = count($indicateurs_global); 
            array_push($indi_array, $indicateurs_global);
            
             $sum = $indicateurs_sum / $count;
             array_push($sum_array,$sum);
             
             //array_sum (array, $sum_array) : int|float;
             
             $sum_total = array_sum($sum_array);
             $counts = count($sum_array);

          }
         $perfo_global = $sum_total / $counts;
         //dd($sum_total);
         //dd($perfo_global);
        //dd($sum_array);
        
        return view('cameg.agent', compact('objectifs','headers','indicateurs',
        'indicateurss','resultats','user_actions','perfo_de_ma','perfo_global'));
    }
    
     public function ag_filter(Request $request){
        $search_ag = $request->get('search_ag');
        $indicateurss = Indicateur::all();
        

          /*$indicateurs = DB::table('indicateurs')
          ->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
         ->select('suivi_indicateurs.id', 'suivi_indicateurs.date','suivi_indicateurs.date_maj',
         'suivi_indicateurs.valeur_prec','suivi_indicateurs.valeur_act as valeur', 'suivi_indicateurs.agent_id','suivi_indicateurs.indicateur_id',
         'suivi_indicateurs.note','suivi_indicateurs.status','suivi_indicateurs.evolution',
         'suivi_indicateurs.indicateur_id','suivi_indicateurs.pourcentage',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.created_at')
                  ->where('indicateurs.libelle', 'like', '%'.$search_dir.'%')
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();*/
                  $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                  ->where('user_id', Auth::user()->id)
                  ->join('directions', 'directions.id', 'agents.direction_id')
                  ->paginate(1);
                  $resultats = Objectif::all();
            $indicateurs = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur',
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at','indicateurs.created_at',
          'directions.nom_direction as direction','objectifs.libelle as stra')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('objectifs.libelle', 'like', '%'.$search_ag.'%')
          ->where('indicateurs.agent_id', Auth::user()->id)
                  ->orderBY('indicateurs.created_at','ASC')
                  ->get();
                  
                  $objectifs = DB::table('objectifs')->select('objectifs.id', 'objectifs.libelle',
         'objectifs.direction_id','objectifs.deadline',  'objectifs.pourcentage',
          'directions.nom_direction')
          //->join('agents', 'agents.id', 'objectifs.agent_id')
          //->join('reunions', 'reunions.id', 'objectifs.reunion_id')
          ->join('directions', 'directions.id', 'objectifs.direction_id')
          ->get();
                  
        return view('cameg.agent', compact('objectifs','headers','indicateurs','indicateurss','objectifs','resultats'));
      }    
      
    
    
          public function action_agent($id)
    {
        //    
        
        $indicateur = Indicateur::find($id);
        
        $actions = DB::table('indicateurs')->select(
         'indicateurs.valeur_prec','indicateurs.valeur_act as valeur', 
          'indicateurs.id', 'indicateurs.libelle', 'indicateurs.cible','indicateurs.pourcentage as pourcent', 'indicateurs.date_cible','indicateurs.updated_at','indicateurs.created_at',
          'directions.nom_direction as direction','objectifs.libelle as stra','agents.prenom','agents.nom',
          'actions.libelle as action','actions.date_action','actions.deadline','actions.status','actions.indicateur_id')
          //->join('suivi_indicateurs', 'suivi_indicateurs.indicateur_id', 'indicateurs.id')
          ->join('actions', 'actions.indicateur_id', 'indicateurs.id')
          ->join('directions', 'directions.id', 'indicateurs.direction_id')
          ->join('objectifs', 'objectifs.id', 'indicateurs.objectif_id')
          ->join('agents', 'agents.id', 'indicateurs.agent_id')
          ->where('agents.id', Auth::user()->id)
          ->where('actions.indicateur_id', '=', $indicateur->id)
            ->orderBY('indicateurs.created_at','ASC')
          ->get();          
                  
                  
        return view('cameg/agent.indi_action_agent', compact('actions','indicateur'));
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indicat_up($id)
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
        $indicateurs = Indicateur::all();
        $directions = Direction::all();
        $indicateur = Indicateur::find($id);
        
         $histories = DB::table('histories')->select('histories.id','histories.note',
        'histories.created_at as date','histories.user_id','histories.agent_id',
        'users.prenom as preDG','users.nom as nomDG','agents.prenom as preAG','agents.nom as nomAG')
        //->where('histories.user_id', Auth::user()->id)
        ->where('histories.action_id', '=', $indicateur->id)
         ->where('histories.agent_id', '=', $indicateur->agent_id)
        ->join('users', 'users.id', 'histories.user_id')
        ->join('agents', 'agents.id', 'histories.agent_id')
        ->orderBy('histories.created_at', 'DESC')
        ->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        return view('cameg/indicateur.indicateur_update_dir', compact('agents','reunions','res_agents','headers','indicateurs','directions','indicateur','histories'));

    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indicat_ups(Request $request, $id)
    {
        //    
        /*$message = "Action commentée";
        $action = Indicateur::findOrFail($id);
        $action->note = $request->get('note');
        $action->pourcentage = $request->get('pourcentage');
        $action->save();*/
        
        $message = "Indicateur modifié avec succès !";
        $action = Indicateur::findOrFail($id);
        $action->pourcentage = $request->get('pourcentage');
        $action->valeur_prec = $request->get('valeur_prec');
        $action->valeur_act = $request->get('valeur_act');
        //$action->save();
        
        if($action->save()){
             
        $suivi_indicateur = new Suivi_indicateur;
        $suivi_indicateur->pourcentage = $request->get('pourcentage'); 
        $suivi_indicateur->valeur_prec = $request->get('valeur_prec');
        $suivi_indicateur->valeur_act = $request->get('valeur_act');
        $suivi_indicateur->indicateur_id = $request->get('indicateur_id');
        $suivi_indicateur->agent_id = $request->get('agent_id');
        $suivi_indicateur->user_id = $request->get('user_id');
        //$suivi_indicateur->save();

         if($suivi_indicateur->save())
                    {
                        return redirect('/DIRECTEUR/dashboard')->with(['message' => $message]);

                    }
                    else
                    {
                        flash('user not saved')->error();

                    }


         }

        return redirect('/DIRECTEUR/dashboard')->with(['message' => $message]); 
    }
    

    
    
}

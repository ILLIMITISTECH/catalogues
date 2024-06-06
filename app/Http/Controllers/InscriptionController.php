<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inscription;
use App\Agent;
use App\Formation;
use App\Client;
use App\Session;
use App\Pay;
use Mailjet\LaravelMailjet\Facades\Mailjet;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
    {
        //

        $inscriptions = DB::table('inscriptions')->select('inscriptions.*')
        //, 'sessions.date_debut','sessions.date_fin',
        //'formations.libelle','formations.image','formations.prix','pays.nom_pay')
        //->join('agents','agents.id', '=', 'inscriptions.agent_id')
        //->join('clients','clients.id', '=', 'inscriptions.client_id')
        //->join('formations','formations.id', '=', 'inscriptions.formation_id')
        //->join('sessions','sessions.id', '=', 'inscriptions.session_id')
        //->join('pays','pays.id', '=', 'inscriptions.pays_id')
        ->orderBy('inscriptions.id', 'DESC')
        ->get();
        $formations = Formation::all();

        return view('illimitis/inscription.index', compact('inscriptions','formations'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function for_filter(Request $request)
    {
        //
        //$objectifs = objectif::all();
        $search_formation = $request->get('search_formation');
        $formations = Formation::all();
        $inscriptions = DB::table('inscriptions')->select('inscriptions.*', 'sessions.date_debut','sessions.date_fin',
        'formations.libelle','formations.image','formations.prix','pays.nom_pay')
        ->join('formations','formations.id', '=', 'inscriptions.formation_id')
        ->join('sessions','sessions.id', '=', 'inscriptions.session_id')
        ->join('pays','pays.id', '=', 'inscriptions.pays_id')
        ->where('formations.libelle', 'like', '%'.$search_formation.'%')
        ->orderBy('inscriptions.id', 'DESC')
        ->get();


        return view('illimitis/inscription.index', compact('inscriptions','formations'));
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
        $clients = Client::all();
        $sessions = Session::all();
        $formations = Formation::all();
        $pays = Pay::all();
        return view('illimitis/inscription.create', compact('agents','clients','sessions','formations','pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $message = 'Vous vous êtes inscrit avec succès !';

        $inscription = new Inscription;
        $inscription->client_id = $request->get('client_id');
        $inscription->session_id = $request->get('session_id');
        $inscription->formation_id = $request->get('formation_id');
        $inscription->prenom = $request->get('prenom');
        $inscription->nom = $request->get('nom');
        $inscription->email = $request->get('email');
        $inscription->mobile = $request->get('mobile');
        $inscription->whatsapp = $request->get('whatsapp');
        $inscription->fonction = $request->get('fonction');
        $inscription->adresse = $request->get('adresse');
        $inscription->pays_id = $request->get('pays_id');
        $inscription->attente_a = $request->get('attente_a');
        $inscription->attente_b = $request->get('attente_b');
        $inscription->attente_c = $request->get('attente_c');
        $inscription->entreprise = $request->get('entreprise');
        $inscription->regler = $request->get('regler');
        $inscription->paie = $request->get('paie');
        $inscription->charge = $request->get('charge');
        $inscription->reference = $request->get('reference');
        $inscription->informer = $request->get('informer');
        $inscription->perso_recom = $request->get('perso_recom');
        $inscription->phone_recom = $request->get('phone_recom');
        $inscription->montant_paye = $request->get('montant_paye');
        $inscription->agent_id = $request->get('agent_id');
        $inscription->save();

        return redirect('/inscriptions')->with(['message' => $message]);
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
        $inscription = Inscription::find($id);
        $inscriptions = DB::table('inscriptions')->select('inscriptions.*', 'sessions.date_debut','sessions.date_fin',
        'formations.libelle','formations.image','formations.prix','pays.nom_pay')
        //->join('agents','agents.id', '=', 'inscriptions.agent_id')
        //->join('clients','clients.id', '=', 'inscriptions.client_id')
        ->join('formations','formations.id', '=', 'inscriptions.formation_id')
        ->join('sessions','sessions.id', '=', 'inscriptions.session_id')
        ->join('pays','pays.id', '=', 'inscriptions.pays_id')
        //->where('agents.id', $inscription->agent_id)
        //->where('clients.id', $inscription->client_id)
        ->where('formations.id', $inscription->formation_id)
        ->where('sessions.id', $inscription->session_id)
        ->where('pays.id', $inscription->pays_id)
        ->first();
        return view('illimitis/inscription.show', compact('inscription','inscriptions'));
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
        $inscription = Inscription::find($id);
        $agents = Agent::all();
        $clients = Client::all();
        $sessions = Session::all();
        $formations = Formation::all();
        $pays = Pay::all();
        return view('illimitis/inscription.edit', compact('inscription','agents','clients','sessions','formations','pays'));
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

        $message = 'modifier avec succee';

        $inscription = Inscription::find($id);
        $inscription->client_id = $request->get('client_id');
        $inscription->session_id = $request->get('session_id');
        $inscription->formation_id = $request->get('formation_id');
        $inscription->prenom = $request->get('prenom');
        $inscription->nom = $request->get('nom');
        $inscription->email = $request->get('email');
        $inscription->mobile = $request->get('mobile');
        $inscription->whatsapp = $request->get('whatsapp');
        $inscription->fonction = $request->get('fonction');
        $inscription->adresse = $request->get('adresse');
        $inscription->pays_id = $request->get('pays_id');
        $inscription->attente_a = $request->get('attente_a');
        $inscription->attente_b = $request->get('attente_b');
        $inscription->attente_c = $request->get('attente_c');
        $inscription->entreprise = $request->get('entreprise');
        $inscription->regler = $request->get('regler');
        $inscription->paie = $request->get('paie');
        $inscription->charge = $request->get('charge');
        $inscription->reference = $request->get('reference');
        $inscription->informer = $request->get('informer');
        $inscription->perso_recom = $request->get('perso_recom');
        $inscription->phone_recom = $request->get('phone_recom');
        $inscription->montant_paye = $request->get('montant_paye');
        $inscription->agent_id = $request->get('agent_id');
        $inscription->update();

        return redirect('/inscriptions')->with(['message' => $message]);
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
        $message = 'supprimer avec succee';
        $inscription = Inscription::find($id);
        $inscription->destroy();
        return back()->with(['message' => $message]);  
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function danger(Request $request, $id)
    {
        //    
        $message = "Inscription changé avec succée";
        $inscription = Inscription::findOrFail($id);
        $inscription->statut_inscription = 0;
        $inscription->save();
        
        
        return redirect('/inscriptions')->with(['message' => $message]); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function warning(Request $request, $id)
    {
        //    
        $message = "Inscription changé avec succée";
        $inscription = Inscription::findOrFail($id);
        $inscription->statut_inscription = 1;
        $inscription->save();
        
        
        return redirect('/inscriptions')->with(['message' => $message]); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request, $id)
    {
        //    
        $message = "Inscription changé avec succée";
        $inscription = Inscription::findOrFail($id);
        $inscription->statut_inscription = 2;
        $inscription->save();
        
        
        return redirect('/inscriptions')->with(['message' => $message]); 
    }
}

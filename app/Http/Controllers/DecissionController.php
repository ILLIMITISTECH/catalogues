<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Decission;
use App\Reunion;
use App\Agent;
use DB;
use Auth;
use App\User;
use Session;

class DecissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$decissions = Decission::all();

        $decissions = DB::table('decissions')->select('decissions.id', 'decissions.libelle',
         'decissions.agent_id','decissions.reunion_id',  'decissions.delais',
          'agents.prenom', 'agents.nom', 'agents.photo', 'agents.id as Id', 'reunions.date', 'reunions.heure_debut', 'reunions.heure_fin', 'reunions.id as ID')
          ->join('agents', 'agents.id', 'decissions.agent_id')
          ->join('reunions', 'reunions.id', 'decissions.reunion_id')->get();
          $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);

        return view('decission.lister', compact('decissions','headers'));
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
        $reunions = Reunion::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('decission.create', compact('agents','reunions','headers'));

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

            $decission = new Decission;
            $decission->libelle = $request->get('libelle');
            $decission->delais = $request->get('delais'); 
            $decission->reunion = $request->get('reunion');
            $decission->agent_id = $request->get('agent_id');
            $decission->reunion_id = $request->get('reunion_id'); 
            $decission->save();

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
        $decission = Decission::find($id);
        $agents = Agent::all();
        $reunions = Reunion::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('decission.edite', compact('agents','reunions', 'decission','headers'));

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

        $message = "Decission modifée avec succée";
        $decission = Decission::find($id);
        $decissionUpdate = $request->all();
        $decission->update($decissionUpdate);

        return redirect('/decissions')->with(['message' => $message]);
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
        $decission = Decission::find($id);
        $decission->delete();

        return back();
    }
}

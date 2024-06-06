<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suivi_action;
use App\Action;
use DB;  
use App\Agent;

class Suivi_actionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$suivi_actions = suivi_action::all();

        $suivi_actions = DB::table('agents')
                ->join('actions', 'actions.agent_id', 'agents.id')
                ->join('suivi_actions', 'suivi_actions.action_id', 'actions.id')
                ->select('suivi_actions.id', 'suivi_actions.deadline', 'suivi_actions.delais', 'suivi_actions.pourcentage', 'suivi_actions.note',
                        'actions.libelle', 'actions.deadline as date',
                        'actions.risque', 'actions.visibilite', 'actions.id as Id', 
                        'agents.prenom', 'agents.nom', 'agents.photo')->get(); 

        return view('suivi_action.lister', compact('suivi_actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $actions = Action::all();
        return view('suivi_action.create', compact('actions'));

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
            'deadline' => 'required|string|max:255',

    ]);
            $message = "Ajouté avec succès";

            $suivi_action = new Suivi_action;
            $suivi_action->deadline = $request->get('deadline');
            $suivi_action->pourcentage = $request->get('pourcentage'); 
            $suivi_action->note = $request->get('note');
            $suivi_action->action = $request->get('action');
            $suivi_action->action_id = $request->get('action_id'); 
            $suivi_action->save();

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
  

        $suivi_action = Suivi_action::find($id);
        $actions = Action::all();
        return view('suivi_action.edite', compact('actions', 'suivi_action'));

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

        
        $message = "Action modifé avec succé";
        $suivi_action = Suivi_action::find($id);
        $suivi_actionUpdate = $request->all();
        $suivi_action->update($suivi_actionUpdate);

        return redirect('/suivi_actions')->with(['message' => $message]);
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
        $suivi_action = Suivi_action::find($id);
        $suivi_action->delete();

        return back();
    }
}

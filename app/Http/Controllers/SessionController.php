<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Session;
use App\Formation;
use Mailjet\LaravelMailjet\Facades\Mailjet;

class SessionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sessions = DB::table('sessions')//->select('sessions.*', 'formations.libelle')
        //->join('formations','formations.id', '=', 'sessions.formation_id')
        ->get();

        return view('illimitis/session.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $formations = Formation::all();
        return view('illimitis/session.create', compact('formations'));
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

        $message = 'Ajouter avec succee';

        $session = new Session;
        $session->formation_id = $request->get('formation_id');
        $session->date_debut = $request->get('date_debut');
        $session->date_fin = $request->get('date_fin');
        $session->save();

        return redirect('/sessions')->with(['message' => $message]);
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
        $session = Session::find($id);
        $sessions = DB::table('sessions')->select('sessions.*', 'formations.libelle',
        'formations.public_cible','formations.objectif','formations.public_cible',
        'formations.prix','formations.duree','formations.image')
        ->join('formations','formations.id', '=', 'sessions.formation_id')
        ->where('formations.id', $session->formation_id)
        ->first();
        return view('illimitis/session.show', compact('session','sessions'));
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
        $session = Session::find($id);
        $formations = Formation::all();
        return view('illimitis/session.edit', compact('session','formations'));
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

        $session = Session::find($id);
        $session->formation_id = $request->get('formation_id');
        $session->date_debut = $request->get('date_debut');
        $session->date_fin = $request->get('date_fin');
        $session->update();

        return redirect('/sessions')->with(['message' => $message]);
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
        $session = Session::find($id);
        $session->delete();
        return back()->with(['message' => $message]);  
    }
}

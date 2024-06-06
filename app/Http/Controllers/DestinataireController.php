<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destinataire;
use DB;

class DestinataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$destinataires = destinataire::all();

        $destinataires = DB::table('destinataires')->select('destinataires.id', 'destinataires.email')
        ->get();
         //$agents = Agent::all();
        //$reunions = Reunion::all();
        //$headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->paginate(1);

        return view('illimitis/destinataire.index', compact('destinataires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
       //$agents = Agent::all();
        //$reunions = Reunion::all();
        //$headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->paginate(1);
        return view('illimitis/destinataire.create');

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
            'email' => 'required|string|max:255',

    ]);
            $message = "Ajouté avec succès";

            $destinataire = new Destinataire;
            $destinataire->email = $request->get('email');
            $destinataire->save();

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
        $destinataire = Destinataire::find($id);
        //$agents = Agent::all();
        //$reunions = Reunion::all();
        //$headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        //->where('user_id', Auth::user()->id)
        //->join('directions', 'directions.id', 'agents.direction_id')
        //->paginate(1);
        return view('illimitis/destinataire.edit', compact('destinataire'));

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

        $message = "Destinataire modifée avec succée";
        $destinataire = Destinataire::find($id);
        $destinataireUpdate = $request->all();
        $destinataire->update($destinataireUpdate);

        return redirect('/destinataires')->with(['message' => $message]);
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
        $destinataire = Destinataire::find($id);
        $destinataire->delete();

        return back();
    }
}

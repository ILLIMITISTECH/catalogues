<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Hebergement;
use App\Pay;  
use App\Document;  
use Mailjet\LaravelMailjet\Facades\Mailjet;
use DataTables;

class HebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
    {
        //

        $hebergements = DB::table('hebergements')
        ->orderBy('deadline', 'desc')
        ->get();

        return view('illimitis/hebergement.index', compact('hebergements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('illimitis/hebergement.create');
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

        $hebergement = new Hebergement;
        $hebergement->libelle = $request->get('libelle');
        $hebergement->description = $request->get('description');
        $hebergement->domaine_sup = $request->get('domaine_sup');
        $hebergement->deadline = $request->get('deadline');
        $hebergement->prix = $request->get('prix');
        $hebergement->pays = $request->get('pays');
        $hebergement->save();

        return redirect('/hebergements')->with(['message' => $message]);
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
        $hebergement = Hebergement::find($id);
        return view('illimitis/hebergement.show', compact('hebergement'));
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
        $hebergement = Hebergement::find($id);
       
        return view('illimitis/hebergement.edit', compact('hebergement'));
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

        $hebergement = Hebergement::find($id);
        $hebergement->libelle = $request->get('libelle');
        $hebergement->description = $request->get('description');
        $hebergement->domaine_sup = $request->get('domaine_sup');
        $hebergement->deadline = $request->get('deadline');
        $hebergement->prix = $request->get('prix');
        $hebergement->pays = $request->get('pays');
        $hebergement->update();

        return redirect('/hebergements')->with(['message' => $message]);
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
        $hebergement = Hebergement::find($id);
        $hebergement->delete();
        return back()->with(['message' => $message]);  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Prospect;
use App\Pay;  
use App\Document;  
use Mailjet\LaravelMailjet\Facades\Mailjet;
use DataTables;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
    {
        //

        $prospects = DB::table('prospects')->select('prospects.*','pays.nom_pay','documents.name as document_name')
        ->join('documents','documents.id', '=', 'prospects.document_id')
        ->join('pays','pays.id', '=', 'prospects.pays_id')
        
        ->get();

        return view('illimitis/prospect.index', compact('prospects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $documents = Document::all();
        $pays = Pay::all();
        return view('illimitis/prospect.create', compact('documents','pays'));
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

        $prospect = new Prospect;
        $prospect->prenom = $request->get('prenom');
        $prospect->nom = $request->get('nom');
        $prospect->email = $request->get('email');
        $prospect->phone = $request->get('phone');
        $prospect->besoins = $request->get('besoins');
        $prospect->document_id = $request->get('document_id');
        $prospect->pays_id = $request->get('pays_id');
        $prospect->save();

        return redirect('/prospects')->with(['message' => $message]);
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
        $prospect = Prospect::find($id);
        $prospects = DB::table('prospects')->select('prospects.*','documents.name',
        'documents.filename','pays.nom_pay')
        ->join('documents','documents.id', '=', 'prospects.document_id')
        ->join('pays','pays.id', '=', 'prospects.pays_id')
        ->where('documents.id', $prospect->document_id)
        ->where('pays.id', $prospect->pays_id)
        ->first();
        return view('illimitis/prospect.show', compact('prospect','prospects'));
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
        $prospect = Prospect::find($id);
        $documents = Document::all();
        $pays = Pay::all();
        return view('illimitis/prospect.edit', compact('prospect','documents','pays'));
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

        $prospect = Prospect::find($id);
        $prospect->prenom = $request->get('prenom');
        $prospect->nom = $request->get('nom');
        $prospect->email = $request->get('email');
        $prospect->phone = $request->get('phone');
        $prospect->besoins = $request->get('besoins');
        $prospect->document_id = $request->get('document_id');
        $prospect->pays_id = $request->get('pays_id');
        $prospect->update();

        return redirect('/prospects')->with(['message' => $message]);
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
        $prospect = Prospect::find($id);
        $prospect->delete();
        return back()->with(['message' => $message]);  
    }
}

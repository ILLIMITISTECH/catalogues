<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Formation;
use App\Categorie;
use App\Document;
use Mailjet\LaravelMailjet\Facades\Mailjet;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $formations = DB::table('formations')
        ->select('formations.*','documents.name','documents.filename')
        ->join('documents','documents.id', '=', 'formations.document_id')
        ->get();

        return view('illimitis/formation.index', compact('formations'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $categories = Categorie::all();
         $documents = Document::all();

        return view('illimitis/formation.create', compact('categories','documents'));
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

        request()->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);
        /*$image = $request->file('image');
           if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/illimitis/', $imageName);
            } */
        $message = 'Ajouter avec succee';

        $formation = new Formation;
        $formation->image = $request->get('image');
        $formation->libelle = $request->get('libelle');
        $formation->objectif = $request->get('objectif');
        $formation->public_cible = $request->get('public_cible');
        $formation->contenu = $request->get('contenu');
        $formation->prix = $request->get('prix');
        $formation->duree = $request->get('duree');
        $formation->categorie_id = $request->get('categorie_id');
        $formation->document_id = $request->get('document_id');
        $formation->save();

        return redirect('/formations')->with(['message' => $message]);
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
        $formation = Formation::find($id);
        $formations = DB::table('formations')
        ->select('formations.*','documents.name','documents.filename')
        ->join('documents','documents.id', '=', 'formations.document_id')
        ->where('documents.id', $formation->document_id)
        ->first();

        return view('illimitis/formation.show', compact('formation','formations'));
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
        $formation = Formation::find($id);
        $categories = Categorie::all();
        $documents = Document::all();
        return view('illimitis/formation.edit', compact('formation','categories'));
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

        request()->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);
        /*$image = $request->file('image');
           if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/illimitis/', $imageName);
            } */
        $message = 'modifier avec succee';

        $formation = Formation::find($id);
        $formation->image = $request->get('image');
        $formation->libelle = $request->get('libelle');
        $formation->objectif = $request->get('objectif');
        $formation->public_cible = $request->get('public_cible');
        $formation->contenu = $request->get('contenu');
        $formation->prix = $request->get('prix');
        $formation->duree = $request->get('duree');
        $formation->categorie_id = $request->get('categorie_id');
        $formation->document_id = $request->get('document_id');
        $formation->update();

        return redirect('/formations')->with(['message' => $message]);
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
        $formation = Formation::find($id);
        $formation->delete();
        return back()->with(['message' => $message]);  
    }
}

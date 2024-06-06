<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categorie; 

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories = DB::table('categories')->select('categories.*')
        ->get();

        return view('illimitis/categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('illimitis/categorie.create');
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

        /*request()->validate([
            'icone.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);
      
        $icone = $request->file('icone');
           if($icone){
           $iconeName = $icone->getClientOriginalName();
           $icone->move(public_path().'/illimitis/', $iconeName);
        } */

        $message = 'Ajouter avec succee';

        $categorie = new Categorie;
        $categorie->nom = $request->get('nom');
        $categorie->icone = $request->get('icone');//$iconeName;
        $categorie->description = $request->get('description');
        $categorie->save();

        return redirect('/categories')->with(['message' => $message]);
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
        $categorie = Categorie::find($id);
        return view('illimitis/categorie.show', compact('categorie'));
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
        $categorie = Categorie::find($id);
        return view('illimitis/categorie.edit', compact('categorie'));
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

        /*request()->validate([
            'icone.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);
      
        $icone = $request->file('icone');
           if($icone){
           $iconeName = $icone->getClientOriginalName();
           $icone->move(public_path().'/illimitis/', $iconeName);
        } */

        $message = 'modifier avec succee';

        $categorie = Categorie::find($id);
        $categorie->nom = $request->get('nom');
        $categorie->icone = $request->get('icone');//$iconeName;
        $categorie->description = $request->get('description');
        $categorie->update();

        return redirect('/categories')->with(['message' => $message]);
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
        $categorie = Categorie::find($id);
        $categorie->delete();
        return back()->with(['message' => $message]);  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Axe;

class AxeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $axes = Axe::all();
        return view('cameg/axe.lister', compact('axes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cameg/axe.ajouter');

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

            $axe = new Axe;
            $axe->libelle = $request->get('libelle'); 
            $axe->save();
            
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
        $axe = Axe::find($id);
        return view('cameg/axe.edite', compact('axe'));

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

        $message = "axe modifée avec succée";
        $axe =  Axe::find($id);
        $axe->libelle = $request->get('libelle'); 
        $axe->update();

        return redirect('/lister_axe')->with(['message' => $message]);
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
        $axe = Axe::find($id);
        $axe->delete();

        return back();
    }
    
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use DB;
use Auth;
class AnnonceController extends Controller
{
    /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $annonces = Annonce::all();

        return view('annonce/v2.lister', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('annonce/v2.create', compact('headers'));

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
            'photo.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'titre' => 'required|string|max:255',
           

    ]);*/

          /* $image = $request->file('photo');
           if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/images/', $imageName);
            } */
            $message = "Ajouté avec succès";

            $annonce = new Annonce;
            $annonce->titre = $request->get('titre'); 
            //$annonce->photo =  $imageName; 
            $annonce->description = $request->get('description'); 
            $annonce->save(); 
            
    
    
    return redirect('/annonces')->with(['message' => $message]);

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
        $annonce = Annonce::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('annonce/v2.edite', compact('annonce','headers'));

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

        $message = "Votre annonce a été modifiée avec succés";
        $annonce = Annonce::find($id);
        $annonceUpdate = $request->all();
        $annonce->update($annonceUpdate);

        return redirect('/annonces')->with(['message' => $message]);
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
        $message = "";
        
        $annonces = DB::table('annonces')->orderBy('created_at', 'DESC')->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        $annonce = Annonce::find($id);
        $annonce->delete();

         return view('annonce/v2.responsable_annonce',compact('headers','annonces','message'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_res_annonce($id)
    {
        //
        $annonce = Annonce::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('annonce/v2.respon_edite', compact('annonce','headers'));

    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_res_annonce(Request $request, $id)
    {
        //

        $message = "Votre annonce a été modifiée avec succés";
        $annonce = Annonce::find($id);
        $annonceUpdate = $request->all();
        $annonce->update($annonceUpdate);

        return redirect('/user_annonce_res')->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function res_supprimer($id)
    {
        
        //
        $message = "D";
        
        $annonces = DB::table('annonces')->orderBy('created_at', 'DESC')->get();
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        
        $annonce = Annonce::find($id);
        $annonce->delete();

        return redirect('/user_annonce_res')->with(['headers'=>$headers,'annonces'=>$annonces,'message'=>$message]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_dg_annonce($id)
    {
        //
        $annonce = Annonce::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('annonce/v2.direct_edite', compact('annonce','headers'));

    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_dg_annonce(Request $request, $id)
    {
        //

        $message = "Votre annonce a été modifiée avec succés";
        $annonce = Annonce::find($id);
        $annonceUpdate = $request->all();
        $annonce->update($annonceUpdate);

        return redirect('/user_annonce')->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dg_supprimer($id)
    {
        
        $message = "D";
        
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);

        $annonce = Annonce::find($id);
        $annonce->delete();

        $annonces = DB::table('annonces')->orderBy('created_at', 'DESC')->get();
        
        return redirect('/user_annonce')->with(['headers'=>$headers,'annonces'=>$annonces,'message'=>$message]);

    }
}

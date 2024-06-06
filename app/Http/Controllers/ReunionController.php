<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reunion;
use DB;
use Auth;
use App\User;
use Session;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reunions = Reunion::all();
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('reunion/v2.lister', compact('reunions','headers'));
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
        return view('reunion/v2.create',compact('headers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate([
            'liste.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
          

    ]);  */
    
            $message = "Votre reunion a été programmée avec succès";
           
            $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
                                          ->where('user_id', Auth::user()->id)
                                          ->join('directions', 'directions.id', 'agents.direction_id')
                                          ->paginate(1);

           $image = $request->file('liste');
           if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/images/', $imageName);
            } 

            $reunion = new Reunion;
            $reunion->date = $request->get('date');
            $reunion->nombre_partici = $request->get('nombre_partici'); 
            $reunion->objet = $request->get('objet');
            //$reunion->liste = $imageName; 
            $reunion->heure_debut = $request->get('heure_debut'); 
            $reunion->heure_fin = $request->get('heure_fin');   
            $reunion->save();
            
            
            
            $reunions = Reunion::all();

            return redirect('/user_reunion_dg')->with(['headers'=>$headers,'reunions'=>$reunions,'message'=>$message]);
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
        $reunion = Reunion::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('reunion/v2.edite', compact('reunion','headers'));

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

        $message = "Reunion modifiée avec succeès";
        /* $reunion = Reunion::find($id);
        $reunionUpdate = $request->all();
        $reunion->update($reunionUpdate); */
        //$image = $request->file('liste');
           /*if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/images/', $imageName);
            } */
            

            $reunion = Reunion::find($id);
            $reunion->date = $request->get('date');
            $reunion->nombre_partici = $request->get('nombre_partici');
            $reunion->objet = $request->get('objet'); 
            //$reunion->liste = $imageName; 
            $reunion->heure_debut = $request->get('heure_debut'); 
            $reunion->heure_fin = $request->get('heure_fin');   
            $reunion->update();


        return redirect('/reunions')->with(['message' => $message]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_res_reunion($id)
    {
        //
        $reunion = Reunion::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('reunion/v2.respon_edite', compact('reunion','headers'));

    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_res_reunion(Request $request, $id)
    {
        //

        $message = "Reunion modifée avec succée";
        /* $reunion = Reunion::find($id);
        $reunionUpdate = $request->all();
        $reunion->update($reunionUpdate); */
        //$image = $request->file('liste');
           /*if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/images/', $imageName);
            } */
            //$message = "Ajouté avec succès";

            $reunion = Reunion::find($id);
            $reunion->date = $request->get('date');
            $reunion->nombre_partici = $request->get('nombre_partici');
            $reunion->objet = $request->get('objet'); 
            //$reunion->liste = $imageName; 
            $reunion->heure_debut = $request->get('heure_debut'); 
            $reunion->heure_fin = $request->get('heure_fin');   
            $reunion->update();


        return redirect('/responsable_reunion')->with(['message' => $message]);
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
        $reunion = Reunion::find($id);
        $reunion->delete();

        return back();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_dg_reunion($id)
    {
        //
        $reunion = Reunion::find($id);
        $headers = DB::table('agents')->select('agents.prenom', 'agents.nom','directions.nom_direction')
        ->where('user_id', Auth::user()->id)
        ->join('directions', 'directions.id', 'agents.direction_id')
        ->paginate(1);
        return view('reunion/v2.direct_edite', compact('reunion','headers'));

    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_dg_reunion(Request $request, $id)
    {
        //

        $message = "Reunion modifiée avec succés";
        /* $reunion = Reunion::find($id);
        $reunionUpdate = $request->all();
        $reunion->update($reunionUpdate); */
        //$image = $request->file('liste');
           /*if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/images/', $imageName);
            } */
            //$message = "Ajouté avec succès";

            $reunion = Reunion::find($id);
            $reunion->date = $request->get('date');
            $reunion->nombre_partici = $request->get('nombre_partici');
            $reunion->objet = $request->get('objet'); 
            //$reunion->liste = $imageName; 
            $reunion->heure_debut = $request->get('heure_debut'); 
            $reunion->heure_fin = $request->get('heure_fin');   
            $reunion->update();


        return redirect('/user_reunion_dg')->with(['message' => $message]);
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
        
        
        $reunion = Reunion::find($id);
        $reunion->delete();
        
        $reunions = DB::table('reunions')->orderBy('created_at', 'DESC')->get();

        return redirect('/user_reunion_dg')->with(['headers'=>$headers,'reunions'=>$reunions,'message'=>$message]);
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
        $reunion = Reunion::find($id);
        $reunion->delete();

        return back();
    }
}

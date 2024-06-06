<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Agent;


class AgentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $agents = DB::table('agents')->select('agents.*')
        ->get();

        return view('illimitis/agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('illimitis/agent.create');
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

        $agent = new Agent;
        $agent->prenom = $request->get('prenom');
        $agent->nom = $request->get('nom');
        $agent->email = $request->get('email');
        $agent->mobile = $request->get('mobile');
        $agent->whatsapp = $request->get('whatsapp');
        $agent->save();

        return redirect('/agents')->with(['message' => $message]);
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
        $agent = Agent::find($id);
        return view('illimitis/agent.show', compact('agent'));
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
        $agent = Agent::find($id);
        return view('illimitis/agent.edit', compact('agent'));
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

        $agent = Agent::find($id);
        $agent->prenom = $request->get('prenom');
        $agent->nom = $request->get('nom');
        $agent->email = $request->get('email');
        $agent->mobile = $request->get('mobile');
        $agent->whatsapp = $request->get('whatsapp');
        $agent->update();

        return redirect('/agents')->with(['message' => $message]);
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
        $agent = Agent::find($id);
        $agent->destroy();
        return back()->with(['message' => $message]);  
    }
}

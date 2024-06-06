<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Client;
use App\Agent;
use App\Pay;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
    {
        //

        $clients = DB::table('clients')->select('clients.*', 'agents.prenom as prenomAgent',
        'agents.nom as nomAgent','pays.nom_pay')
        ->join('agents','agents.id', '=', 'clients.agent_id')
        ->join('pays','pays.id', '=', 'clients.pays_id')
        ->get();

        return view('illimitis/client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $agents = Agent::all();
        $pays = Pay::all();
        return view('illimitis/client.create', compact('agents','pays'));
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

        $client = new Client;
        $client->prenom = $request->get('prenom');
        $client->nom = $request->get('nom');
        $client->email = $request->get('email');
        $client->mobile = $request->get('mobile');
        $client->whatsapp = $request->get('whatsapp');
        $client->fonction = $request->get('fonction');
        $client->adresse = $request->get('adresse');
        $client->agent_id = $request->get('agent_id');
        $client->pays_id = $request->get('pays_id');
        $client->save();

        return redirect('/clients')->with(['message' => $message]);
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
        $client = Client::find($id);
        $clients = DB::table('clients')->select('clients.*', 'agents.prenom as prenomAgent',
        'agents.nom as nomAgent','pays.nom_pay')
        ->join('agents','agents.id', '=', 'clients.agent_id')
        ->join('pays','pays.id', '=', 'clients.pays_id')
        ->where('agents.id', $client->agent_id)
        ->where('pays.id', $client->pays_id)
        ->first();
        return view('illimitis/client.show', compact('client','clients'));
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
        $client = Client::find($id);
        $agents = Agent::all();
        $pays = Pay::all();
        return view('illimitis/client.edit', compact('client','agents','pays'));
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

        $client = Client::find($id);
        $client->prenom = $request->get('prenom');
        $client->nom = $request->get('nom');
        $client->email = $request->get('email');
        $client->mobile = $request->get('mobile');
        $client->whatsapp = $request->get('whatsapp');
        $client->fonction = $request->get('fonction');
        $client->adresse = $request->get('adresse');
        $client->agent_id = $request->get('agent_id');
        $client->pays_id = $request->get('pays_id');
        $client->update();

        return redirect('/clients')->with(['message' => $message]);
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
        $client = Client::find($id);
        $client->destroy();
        return back()->with(['message' => $message]);  
    }
}

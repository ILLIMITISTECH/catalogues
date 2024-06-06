<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Direction;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('service.lister', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $directions = Direction::all();
        return view('service.create', compact('directions'));

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
            'nom_service' => 'required|string|max:255',

    ]);
            $message = "Ajouté avec succès";

            $service = new Service;
            $service->nom_service = $request->get('nom_service');
            $service->direction = $request->get('direction'); 
            $service->direction_id = $request->get('direction_id');  
            $service->save();

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
        $service = Service::find($id);
        $directions = Direction::all();
        return view('service.edite', compact('directions','service'));

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

        $message = "Service modifé avec succé";
        $service = Service::find($id);
        $serviceUpdate = $request->all();
        $service->update($serviceUpdate);

        return redirect('/services')->with(['message' => $message]);
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
        $service = Service::find($id);
        $service->delete();

        return back();
    }
}

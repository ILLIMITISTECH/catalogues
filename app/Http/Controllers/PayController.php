<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pay;  

class PayController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pays = DB::table('pays')->select('pays.*')
        ->get();

        return view('illimitis/pay.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('illimitis/pay.create');
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

        $pay = new Pay;
        $pay->nom_pay = $request->get('nom_pay');
        $pay->save();

        return redirect('/pays')->with(['message' => $message]);
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
        $pay = Pay::find($id);
        return view('illimitis/pay.show', compact('pay'));
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
        $pay = Pay::find($id);
        return view('illimitis/pay.edit', compact('pay'));
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

        $pay = Pay::find($id);
        $pay->nom_pay = $request->get('nom_pay');
        $pay->update();

        return redirect('/pays')->with(['message' => $message]);
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
        $pay = Pay::find($id);
        $pay->destroy();
        return back()->with(['message' => $message]);  
    }
}

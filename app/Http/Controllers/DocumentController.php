<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Document; 
use Mailjet\LaravelMailjet\Facades\Mailjet;

class DocumentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $documents = DB::table('documents')->select('documents.*')
        ->get();

        return view('illimitis/document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('illimitis/document.create');
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
            'filename.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'image.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',

        ]);
        $filename = $request->file('filename');
           if($filename){
           $filenameName = $filename->getClientOriginalName();
           $filename->move(public_path().'/illimitis/', $filenameName);
        } 

        $image = $request->file('image');
           if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/illimitis/', $imageName);
        } 

        $message = 'Ajouter avec succee';

        $document = new document;
        $document->name = $request->get('name');
        $document->filename = $filenameName;
        $document->image = $request->get('image');
        $document->description = $request->get('description');
        $document->save();

        return redirect('/documents')->with(['message' => $message]);
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
        $document = Document::find($id);
        return view('illimitis/document.show', compact('document'));
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
        $document = Document::find($id);
        return view('illimitis/document.edit', compact('document'));
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
            'filename.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'image.*' => 'mimes:doc,pdf,docx,zip,png,jpeg,odt,jpg,svc,csv,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',

        ]);
        $filename = $request->file('filename');
           if($filename){
           $filenameName = $filename->getClientOriginalName();
           $filename->move(public_path().'/illimitis/', $filenameName);
        } 

        $image = $request->file('image');
           if($image){
           $imageName = $image->getClientOriginalName();
           $image->move(public_path().'/illimitis/', $imageName);
        } 

        $message = 'modifier avec succee';

        $document = Document::find($id);
        $document->name = $request->get('name');
        $document->filename = $filenameName;
        $document->image = $request->get('image');
        $document->description = $request->get('description');
        $document->update();

        return redirect('/documents')->with(['message' => $message]);
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
        $document = Document::find($id);
        $document->delete();
        return back()->with(['message' => $message]);  
    }
}

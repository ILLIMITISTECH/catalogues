<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use App\Document; 
use App\Prospect; 
use App\Pay; 
use App\User;
use App\Role;
use App\Inscription;
use App\Agent;
use App\Formation;
use App\Client;
use App\Contact;
use App\Session;
use Auth;
use Mail; 
use App\Mail\SendMail;
use App\Mail\Catalogue;
use App\Mail\Welcome;

use Mailjet\LaravelMailjet\Facades\Mailjet;

class AdfController extends Controller
{ 
    
    
    public function ajout_formulaireAdf()
    {
        $pays = DB::table('pays')->orderby('nom_pay')->get();
        return view('adf.formulaire', compact('pays'));
    }
    
    
    public function store_formulaireAdf(Request $request)
    {
        //

        $message = "Merci d'avoir rempli le formulaire précédent.";
        $messages = "Abonnez-vous à nos pages ci-dessous pour rester en contact et renforcer vos capacités dans nos 7 domaines de formation; et visitez notre site Internet pour découvrir toutes nos solutions digitales et nos formations.";
        $user = new User;
        $user->prenom = $request->get('prenom');
        $user->nom = $request->get('nom');
        $user->email = $request->get('email');
        $user->genre = $request->get('genre');
        // $user->nom_role = $request->get('nom_role');
        // $user->role_id = $request->get('role_id');
        $user->password = Hash::make($request->get('password'));

        if($user->save()){
            error_log('la création a réussi');

        $prospect = new Prospect;
        $prospect->prenom = $request->get('prenom');
        $prospect->nom = $request->get('nom');
        $prospect->email = $request->get('email');
        $prospect->phone = $request->get('phone');
        $prospect->besoins = $request->get('besoins');
        $prospect->document_id = 3;
        $prospect->genre = $request->get('genre');
        $prospect->pays_id = $request->get('pays_id');
        $prospect->user_id = $user->id;
        //$prospect->save();
        
        if($prospect->save())
        {
            Auth::login($user);
            
            $send = DB::table('users')->select('prenom')->where('id', '=', Auth::user()->id)->first();
            $sends = DB::table('users')->select('email')->where('id', '=', Auth::user()->id)->first();
            $prenom = $send->prenom;
            $emails = $sends->email;
          
            //$prospect = DB::table('prospects')->select('document_id')->where('user_id', '=', Auth::user()->id)->first();
            $document = DB::table('documents')->select('documents.id','documents.filename','documents.name')
                            ->where('documents.id', 1)
                            ->first();
            $doc = $document->filename;
            $name = $document->name;
            
            $sale = "sales@illimitis";
            $training = "training@illimitis.com";
            $fg = "fallou.g@illimitis.com";
             \Mail::to($user->email)->send(new Welcome($user, $doc, $name));
            
          
            return redirect('/page_ok')->with(['messages' => $messages,'message' => $message]);

        }
        else
        {
            flash('user not saved')->error();

        }
        
        }
        return redirect('/page_ok')->with(['message' => $message]);
    }
}
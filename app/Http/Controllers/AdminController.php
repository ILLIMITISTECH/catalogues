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
use Mailjet\LaravelMailjet\Facades\Mailjet;

class AdminController extends Controller
{ 
    //

    public function admin()

    {
        $formations = DB::table('formations')->get();

        $sessions = DB::table('sessions')->select('sessions.*', 'formations.libelle',
        'formations.public_cible','formations.objectif','formations.public_cible',
        'formations.prix','formations.duree','formations.image')
        ->join('formations','formations.id', '=', 'sessions.formation_id')
        ->join('documents','documents.id', '=', 'formations.document_id')
        ->get();
        return view('illimitis.admin', compact('formations','sessions'));
    }

    public function calendrier()

    {
        $categories = DB::table('categories')->select('categories.*')
        ->get();
        $formations = DB::table('formations')->select('formations.*',
        'sessions.date_debut','sessions.date_fin','documents.name','documents.filename')
        ->join('sessions', 'sessions.formation_id', 'formations.id')
        ->join('documents','documents.id', '=', 'formations.document_id')
        ->get();

        return view('illimitis.calendrier', compact('categories','formations'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calendrier_for($id)
    {
        //
        $formation = Formation::find($id);
        $formations = DB::table('formations')->select('formations.*')
        ->where('id', $formation->id)
        ->get();
        $agents = Agent::all();
        $clients = Client::all();
        $pays = Pay::all();
        $sessions = DB::table('sessions')->select('sessions.*')->where('formation_id', $formation->id)->first();
        //$formations = Formation::all();

        return view('illimitis.calendrier_ins',compact('formation','formations','sessions','clients','agents','pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_inscription(Request $request)
    {
        //

        $message = 'Inscription ajouter avec succee';
        
        $user = new User;
        $user->prenom = $request->get('prenom');
        $user->nom = $request->get('nom');
        $user->email = $request->get('email');
        $user->nom_role = $request->get('nom_role');
        $user->role_id = $request->get('role_id');
        $user->password = Hash::make($request->get('password'));

        if($user->save()){
            error_log('la création a réussi');

        $inscription = new Inscription;
        $inscription->client_id = $request->get('client_id');
        $inscription->session_id = $request->get('session_id');
        $inscription->formation_id = $request->get('formation_id');
        $inscription->prenom = $request->get('prenom');
        $inscription->nom = $request->get('nom');
        $inscription->email = $request->get('email');
        $inscription->mobile = $request->get('mobile');
        $inscription->whatsapp = $request->get('whatsapp');
        $inscription->fonction = $request->get('fonction');
        $inscription->adresse = $request->get('adresse');
        $inscription->pays_id = $request->get('pays_id');
        $inscription->attente_a = $request->get('attente_a');
        $inscription->attente_b = $request->get('attente_b');
        $inscription->attente_c = $request->get('attente_c');
        $inscription->entreprise = $request->get('entreprise');
        $inscription->regler = $request->get('regler');
        $inscription->paie = $request->get('paie');
        $inscription->charge = $request->get('charge');
        $inscription->reference = $request->get('reference');
        $inscription->informer = $request->get('informer');
        $inscription->perso_recom = $request->get('perso_recom');
        $inscription->phone_recom = $request->get('phone_recom');
        $inscription->montant_paye = $request->get('montant_paye');
        $inscription->agent_id = $request->get('agent_id');
        $inscription->user_id = $request->get('user_id');  
        $inscription->user_id = $user->id;
        //$inscription->save();
        
        if($inscription->save())
        {
            Auth::login($user);
            
            $send = DB::table('users')->select('prenom')->where('id', '=', Auth::user()->id)->first();
            $sends = DB::table('users')->select('email')->where('id', '=', Auth::user()->id)->first();
            $prenoms = $send->prenom;
            $emails = $sends->email;
            //$prous = Auth::user()->id;
            $inscription = DB::table('inscriptions')->select('inscriptions.*','formations.libelle','pays.nom_pay','sessions.date_debut','sessions.date_fin')
            ->join('formations','formations.id', '=', 'inscriptions.formation_id')
            ->join('sessions','sessions.id', '=', 'inscriptions.session_id')
            ->join('pays','pays.id', '=', 'inscriptions.pays_id')
            ->where('inscriptions.user_id', '=', Auth::user()->id)
            ->first();
            
            $libelle = $inscription->libelle;
            $prenom = $inscription->prenom;
            $nom = $inscription->nom;
            $entreprise = $inscription->entreprise;
            $pays = $inscription->nom_pay;
            $session = date('d/m/Y', strtotime($inscription->date_debut));
            $fonction = $inscription->fonction;
            $mobile = $inscription->mobile;
            $whatsapp = $inscription->whatsapp;
            $email = $inscription->email;
            $attente_a = $inscription->attente_a;
            $attente_b = $inscription->attente_b;
            $regler = $inscription->regler;
            $paie = $inscription->paie;
            $charge = $inscription->charge;
            $reference = $inscription->reference;
            $informer = $inscription->informer;
           
            
            $destinataire = DB::table('destinataires')->select('destinataires.email')->get();
            //$to = "$emails,fallou.g@illimitis.com,
                    //roland.k@illimitis.com,
                    //axel.n@illimitis.com,
                    //info@illimitis.com";
            foreach($destinataire as $desti){
            $to = "$emails,$desti->email";
            }
            $subject = "Inscription à la formation :  $libelle";
            $body = "<!doctype html><html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head><title>ILLIMITIS</title><!--[if !mso]><!-- --><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]--><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta name='viewport' content='width=device-width,initial-scale=1'><style type='text/css'>#outlook a { padding:0; }
    body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
    table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
    img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
    p { display:block;margin:13px 0; }</style><!--[if mso]>
  <xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
  </xml>
  <![endif]--><!--[if lte mso 11]>
  <style type='text/css'>
    .mj-outlook-group-fix { width:100% !important; }
  </style>
  <![endif]--><!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'><style type='text/css'>@import url(https://fonts.googleapis.com/css?family=Montserrat);</style><!--<![endif]--><style type='text/css'>@media only screen and (min-width:480px) {
  .mj-column-per-67 { width:67% !important; max-width: 67%; }
.mj-column-per-33 { width:33% !important; max-width: 33%; }
.mj-column-per-100 { width:100% !important; max-width: 100%; }
}</style><style type='text/css'>[owa] .mj-column-per-67 { width:67% !important; max-width: 67%; }
[owa] .mj-column-per-33 { width:33% !important; max-width: 33%; }
[owa] .mj-column-per-100 { width:100% !important; max-width: 100%; }</style><style type='text/css'>@media only screen and (max-width:480px) {
table.mj-full-width-mobile { width: 100% !important; }
td.mj-full-width-mobile { width: auto !important; }
}</style></head><body style='background-color:#ffffff;'><div style='background-color:#ffffff;'><!--[if mso | IE]><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]-->
    <div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'>
    <tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:402px;' ><![endif]-->
    <div class='mj-column-per-67 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'>
    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 0px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'>
    <div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='margin: 10px 0;'></p></div></td></tr></table></div><!--[if mso | IE]></td><td class='' style='vertical-align:top;width:198px;' ><![endif]-->
    <div class='mj-column-per-33 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'>
    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 0px;padding-top:0px;padding-bottom:0px;word-break:break-word;'>
    <div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: right; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'>
    <span style='font-size:13px;text-align:right;color:#55575d;font-family:Arial;line-height:22px;'><a href='[[PERMALINK]]' style='color:inherit;text-decoration:none;' target='_blank'></a></span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]-->
    </td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]-->
    <div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'><tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;'>
    <!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'>
    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='center' style='font-size:0px;padding:10px 25px;word-break:break-word;'>
    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='border-collapse:collapse;border-spacing:0px;'><tbody><tr><td style='width:300px;'>
    <img alt='' height='auto' src='https://xtxky.mjt.lu/tplimg/xtxky/b/s4qmx/6l08y.png' style='border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;' width='300'></td></tr></tbody></table></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]-->
    </td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]-->
    <div style='background:#f2f2f2;background-color:#f2f2f2;margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#f2f2f2;background-color:#f2f2f2;width:100%;'><tbody><tr>
        <td style='border:0px solid #ffffff;direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-left:0px;padding-right:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]-->
        <div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr>
            <td align='left' style='font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:18px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'>
            <h1 class='text-build-content' data-testid='i13fCPElEi79' style='margin-top: 10px; margin-bottom: 10px; font-weight: normal;'><span style='font-family:Montserrat;font-size:18px;'>
            <b>$prenoms, vous êtes inscrit(e) à la formation : &nbsp;$libelle </b></span></h1></div></td></tr><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:15px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' data-testid='N-j5YmirOz9r' style='margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='color:#000000;font-family:Montserrat;font-size:15px;'>Notre équipe formation vous contactera pour la finalisation du processus d’inscription et la documentation utile pré-formation</span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='background:#f2f2f2;background-color:#f2f2f2;margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#f2f2f2;background-color:#f2f2f2;width:100%;'><tbody><tr><td style='border:0px solid #ffffff;direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-left:0px;padding-right:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td style='font-size:0px;padding:0px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;color:#000000;'><table class='table table-dark table-striped' style='width :80%;border-collapse: separate;
border-spacing: 0 18px; font-family : Montserrat; margin-left : 5%;'>
<tr><td>Prénom</td><td>$prenom</td></tr>
<tr><td>Nom</td><td>$nom</td></tr>
<tr><td>Entreprise / Institution</td><td>$entreprise</td></tr>
<td>Fonction / Occupation</td><td>$fonction</td><tr>
    <td>Pays de résidence ?</td><td>$pays</td></tr>
    <tr><td>A quelle session participez-vous ?</td><td>$session</td></tr>
    <tr><td>Tel. Mobile :</td><td>$mobile</td></tr>
    <tr><td>Tel. WhatsApp</td><td>$whatsapp</td></tr>
    <tr><td>Email</td><td>$email</td></tr>
    <tr><td>Attente 1</td><td>$attente_a</td></tr>
    <tr><td>Attente 2</td><td>$attente_b</td></tr>
    <tr><td>Comment réglez-vous cette formation ?</td><td>$regler</td></tr>
    <tr><td>Qui paie cette formation ?</td><td>$paie</td></tr>
    <tr><td>Nom et coordonnées du sponsor ou de la personne en charge de votre inscription (si applicable)</td><td>$charge</td></tr>
    <tr><td>References paiement mobile / transfert</td><td>$reference</td></tr>
    <tr><td>Comment avez vous été informé(e) de cette formation ?</td><td>$informer</td></tr></table><style>td {
border-bottom: 1px solid gray;
}</style></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='background:#f2f2f2;background-color:#f2f2f2;margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#f2f2f2;background-color:#f2f2f2;width:100%;'><tbody><tr><td style='border:0px solid #ffffff;direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-left:0px;padding-right:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='background:#f2f2f2;font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:25px;padding-bottom:0px;padding-left:25px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:15px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' data-testid='fVDvt9LHs' style='margin: 10px 0; margin-top: 10px;'><span style='color:#000000;font-family:Montserrat;font-size:15px;'>Nous restons joignables au :&nbsp;</span></p><p class='text-build-content' data-testid='fVDvt9LHs' style='margin: 10px 0;'>
<span style='color:#000000;font-family:Montserrat;font-size:15px;'>Burkina Faso 🇧🇫 | +226 75 30 30 75</span></p><p class='text-build-content' data-testid='fVDvt9LHs' style='margin: 10px 0;'>
<span style='color:#000000;font-family:Montserrat;font-size:15px;'>Sénégal 🇸🇳 | +221 77 416 69 69</span></p><p class='text-build-content' data-testid='fVDvt9LHs' style='margin: 10px 0; margin-bottom: 10px;'>
<span style='color:#000000;font-family:Montserrat;font-size:15px;'>Côte d'Ivoire 🇨🇮 | +225 01 41 18 05 05</span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'><tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:center;color:#55575d;font-family:Arial;line-height:22px;'><a href='[[UNSUB_LINK_EN]]' style='color:inherit;text-decoration:none;' target='_blank'></a>.</span></p></div></td></tr><tr><td align='left' style='font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:center;color:#55575d;font-family:Arial;line-height:22px;'></span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><![endif]--></div></body></html>";
                                            
               $headers = "From: info@illimitis.com" . "\r\n" 
                                ."Content-Type:text/html;charset=\"utf-8\"";
                                
               mail($to,$subject,$body,$headers);
               
          
            
            
                echo '<br><br><br> <span class="alert alert-success" role="alert" style ="margin-top : 100px; margin-left : 150px; width : 350px;"> Les Mails ont été envoyés avec succès </span>';
           
            return redirect('/page_ok')->with(['message' => $message]);

        }
        else
        {
            flash('user not saved')->error();

        }
        
        }
        return redirect('/')->with(['message' => $message]);

    }
    public function catalogues()

    {

        $documents = DB::table('documents')->select('documents.*')
        ->get();

        return view('illimitis.catalogue',compact('documents'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function document_cata($id)
    {
        //
        $document = Document::find($id);
        $documents = DB::table('documents')->select('documents.*')
        ->where('id', $document->id)
        ->get();
        $pays = Pay::all();
        return view('illimitis.catalogue_tel',compact('document','documents','pays'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function document_catafl($id)
    {
        //
        $document = Document::find($id);
        $documents = DB::table('documents')->select('documents.*')
        ->where('id', $document->id)
        ->get();
        $pays = Pay::all();
        return view('illimitis.catalogue_telfl',compact('document','documents','pays'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function document_cata_ins($id)
    {
        //
        $formation = Formation::find($id);
        $formations = DB::table('formations')
        ->select('formations.*','documents.name','documents.filename')
        ->join('documents','documents.id', '=', 'formations.document_id')
        ->where('documents.id', $formation->document_id)
        ->first();
        $pays = Pay::all();
        return view('illimitis.catalogue_tel_ins',compact('formation','formations','pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_document_prospect_ins(Request $request)
    {
        //

        $message = 'Votre demande a été prise en charge, vous recevrez le catalogue par mail dans quelques secondes.';

        $user = new User;
        $user->prenom = $request->get('prenom');
        $user->nom = $request->get('nom');
        $user->email = $request->get('email');
        $user->nom_role = $request->get('nom_role');
        $user->role_id = $request->get('role_id');
        $user->password = Hash::make($request->get('password'));

        if($user->save()){
            error_log('la création a réussi');

        $prospect = new Prospect;
        $prospect->prenom = $request->get('prenom');
        $prospect->nom = $request->get('nom');
        $prospect->email = $request->get('email');
        $prospect->phone = $request->get('phone');
        $prospect->besoins = $request->get('besoins');
        $prospect->document_id = $request->get('document_id');
        $prospect->pays_id = $request->get('pays_id');
        $prospect->user_id = $request->get('user_id');  
        $prospect->user_id = $user->id;
        //$prospect->save();
        
        if($prospect->save())
        {
            Auth::login($user);
            
            $send = DB::table('users')->select('prenom')->where('id', '=', Auth::user()->id)->first();
            $sends = DB::table('users')->select('email')->where('id', '=', Auth::user()->id)->first();
            $prenom = $send->prenom;
            $emails = $sends->email;
            //$prous = Auth::user()->id;
            $prospect = DB::table('prospects')->select('document_id')->where('user_id', '=', Auth::user()->id)->first();
            $document = DB::table('documents')->select('documents.id','documents.filename','documents.name')
                            ->where('documents.id', $prospect->document_id)
                            ->first();
            $doc = $document->filename;
            $name = $document->name;
            $destinataire = DB::table('destinataires')->select('destinataires.email')->get();
            $sale = "sales@illimitis";
            $training = "training@illimitis.com";
            $fg = "fallou.g@illimitis.com";
                        //\Mail::to($user['email'], $sale, $training, $fg)->send(new Welcome($doc, $name));
           if($document->id = 4)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     //$to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                     \Mail::to($user->email)->send(new Catalogue($doc, $name));
                                // }
                                
                                }
                                
                                elseif($document->id = 5)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     //$to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                     \Mail::to($user->email)->send(new Catalogue($doc, $name));
                                // }
                                
                                }
                                
                                elseif($document->id = 6)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     //$to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                     \Mail::to($user->email)->send(new Catalogue($doc, $name));
                                // }
                                
                                }
                                elseif($document->id = 7)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     //$to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                     \Mail::to($user->email)->send(new Catalogue($doc, $name));
                                // }
                                
                                }
                                elseif($document->id = 8)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     //$to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                     \Mail::to($user->email)->send(new Catalogue($doc, $name));
                                // }
                                
                                }
                                else{
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     //$to = "training@illimitis.com,$user->email";
                                     \Mail::to($user->email)->send(new Catalogue($doc, $name));
                                // }
                                
                                }
             
                        
            return redirect('/page_okins')->with(['message' => $message]);

        }
        else
        {
            flash('user not saved')->error();

        }
        
        }
        return redirect('/page_okins')->with(['message' => $message]);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_document_prospect(Request $request)
    {
        //

        $message = 'Votre demande a été prise en charge, vous recevrez le catalogue par mail dans quelques secondes.';

        $user = new User;
        $user->prenom = $request->get('prenom');
        $user->nom = $request->get('nom');
        $user->email = $request->get('email');
        $user->nom_role = $request->get('nom_role');
        $user->role_id = $request->get('role_id');
        $user->password = Hash::make($request->get('password'));

        if($user->save()){
            error_log('la création a réussi');

        $prospect = new Prospect;
        $prospect->prenom = $request->get('prenom');
        $prospect->nom = $request->get('nom');
        $prospect->email = $request->get('email');
        $prospect->phone = $request->get('phone');
        $prospect->besoins = $request->get('besoins');
        $prospect->document_id = $request->get('document_id');
        $prospect->pays_id = $request->get('pays_id');
        $prospect->user_id = $request->get('user_id');  
        $prospect->user_id = $user->id;
        //$prospect->save();
        
        if($prospect->save())
        {
            Auth::login($user);
            
            $send = DB::table('users')->select('prenom')->where('id', '=', Auth::user()->id)->first();
            $sends = DB::table('users')->select('email')->where('id', '=', Auth::user()->id)->first();
            $prenom = $send->prenom;
            $emails = $sends->email;
            //$prous = Auth::user()->id;
            $prospect = DB::table('prospects')->select('document_id')->where('user_id', '=', Auth::user()->id)->first();
            $document = DB::table('documents')->select('documents.id','documents.filename','documents.name')
                            ->where('documents.id', $prospect->document_id)
                            ->first();
            $doc = $document->filename;
            $name = $document->name;
            $destinataire = DB::table('destinataires')->select('destinataires.email')->get();
            
            $sale = "sales@illimitis";
            $training = "training@illimitis.com";
            $fg = "fallou.g@illimitis.com";
             \Mail::to($user->email, $fg)->send(new Catalogue($doc, $name));
            
            //$to = "$emails,fallou.g@illimitis.com,
                    //roland.k@illimitis.com,
                    //axel.n@illimitis.com,
                    //info@illimitis.com";
            //foreach($destinataire as $desti){
            //$to = "$emails,$desti->email";
        //    }
          
            return redirect('/page_ok')->with(['message' => $message]);

        }
        else
        {
            flash('user not saved')->error();

        }
        
        }
        return redirect('/page_ok')->with(['message' => $message]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_document_prospectfl(Request $request)
    {
        //

        $message = 'Votre demande a été prise en charge, vous recevrez le catalogue par mail dans quelques secondes.';

        $user = new User;
        $user->prenom = $request->get('prenom');
        $user->nom = $request->get('nom');
        $user->email = $request->get('email');
        $user->nom_role = $request->get('nom_role');
        $user->role_id = $request->get('role_id');
        $user->password = Hash::make($request->get('password'));

        if($user->save()){
            error_log('la création a réussi');

        $prospect = new Prospect;
        $prospect->prenom = $request->get('prenom');
        $prospect->nom = $request->get('nom');
        $prospect->email = $request->get('email');
        $prospect->phone = $request->get('phone');
        $prospect->besoins = $request->get('besoins');
        $prospect->document_id = $request->get('document_id');
        $prospect->pays_id = $request->get('pays_id');
        $prospect->user_id = $request->get('user_id');  
        $prospect->user_id = $user->id;
        //$prospect->save();
        
        if($prospect->save())
        {
            Auth::login($user);
            
            $send = DB::table('users')->select('prenom')->where('id', '=', Auth::user()->id)->first();
            $sends = DB::table('users')->select('email')->where('id', '=', Auth::user()->id)->first();
            $prenom = $send->prenom;
            $emails = $sends->email;
            //$prous = Auth::user()->id;
            $prospect = DB::table('prospects')->select('document_id')->where('user_id', '=', Auth::user()->id)->first();
            $document = DB::table('documents')->select('documents.id','documents.filename','documents.name')
                            ->where('documents.id', $prospect->document_id)
                            ->first();
            $doc = $document->filename;
            $name = $document->name;
            // $destinataire = DB::table('destinataires')->select('destinataires.email')->get();
            $sale = "sales@illimitis";
            $training = "training@illimitis.com";
            $fg = "fallou.g@illimitis.com";
            
            $envoie = DB::table('documents')
                            ->where('id', $prospect->document_id)
                             ->get();
                            
                                if($document->id = 5)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     $to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                // }
                                
                                }
                                elseif($document->id = 6)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     $to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                // }
                                
                                }
                                elseif($document->id = 7)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     $to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                // }
                                
                                }
                                elseif($document->id = 8)    {
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     $to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                // }
                                
                                }
                                else{
                                 // // // // // // //$destinataires = DB:: table('destinataires')
                                 // // // // // //->where('email', '=','fallou.g@illimitis.com')
                                 // // // // //->where('email', '=','axel.n@illimitis.com')
                                 // // // //->where('email', '=','maria.z@illimitis.com')
                                // // // ->where('email', '=','boris.b@illimitis.com')
                                // // ->where('email', '=','anthyme.k@illimitis.com')
                                // ->get();
                                // // foreach($destinataires as $dest){
                                     $to = "sales@illimitis.com,training@illimitis.com,$user->email";
                                // }
                                
                                }
                                    
                                
                            
            
            //$to = "$emails,fallou.g@illimitis.com,
                    //roland.k@illimitis.com,
                    //axel.n@illimitis.com,
                    //info@illimitis.com";
            //foreach($destinataire as $desti){
            //$to = "$emails,$desti->email";
            //}
            $subject = "Votre $name est disponible !";
            $body = "<!doctype html><html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head><title>ILLIMITIS</title><!--[if !mso]><!-- --><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]--><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta name='viewport' content='width=device-width,initial-scale=1'><style type='text/css'>#outlook a { padding:0; }
          body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
          table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
          img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
          p { display:block;margin:13px 0; }</style><!--[if mso]>
        <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]--><!--[if lte mso 11]>
        <style type='text/css'>
          .mj-outlook-group-fix { width:100% !important; }
        </style>
        <![endif]--><!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'><style type='text/css'>@import url(https://fonts.googleapis.com/css?family=Montserrat);</style><!--<![endif]--><style type='text/css'>@media only screen and (min-width:480px) {
        .mj-column-per-67 { width:67% !important; max-width: 67%; }
.mj-column-per-33 { width:33% !important; max-width: 33%; }
.mj-column-per-100 { width:100% !important; max-width: 100%; }
      }</style><style type='text/css'>[owa] .mj-column-per-67 { width:67% !important; max-width: 67%; }
[owa] .mj-column-per-33 { width:33% !important; max-width: 33%; }
[owa] .mj-column-per-100 { width:100% !important; max-width: 100%; }</style><style type='text/css'>@media only screen and (max-width:480px) {
      table.mj-full-width-mobile { width: 100% !important; }
      td.mj-full-width-mobile { width: auto !important; }
    }</style></head><body style='background-color:#F4F4F4;'><div style='background-color:#F4F4F4;'><!--[if mso | IE]><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'><tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:402px;' ><![endif]--><div class='mj-column-per-67 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 0px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='margin: 10px 0;'></p></div></td></tr></table></div><!--[if mso | IE]></td><td class='' style='vertical-align:top;width:198px;' ><![endif]--><div class='mj-column-per-33 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 0px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: right; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:right;color:#55575d;font-family:Arial;line-height:22px;'><a href='[[PERMALINK]]' style='color:inherit;text-decoration:none;' target='_blank'>View online version</a></span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#ffffff;background-color:#ffffff;width:100%;'><tbody><tr><td style='border:0px solid #ffffff;direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-left:0px;padding-right:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='center' style='font-size:0px;padding:10px 25px;word-break:break-word;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='border-collapse:collapse;border-spacing:0px;'><tbody><tr><td style='width:300px;'><img alt='' height='auto' src='https://xtxky.mjt.lu/tplimg/xtxky/b/s4p7q/6pxhr.png' style='border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;' width='300'></td></tr></tbody></table></td></tr><tr><td align='left' style='font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><h2 class='text-build-content' style='text-align:center;; margin-top: 10px; margin-bottom: 10px; font-weight: normal;' data-testid='l_plMzzq0'><span style='color:#000000;font-family:Montserrat;font-size:18px;'><b>FORMATIONS | SOLUTIONS | INNOVATION</b></span></h2></div></td></tr><tr><td align='left' style='font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;' data-testid='J40UN3jbp'><span style='color:#000000;font-family:Montserrat;font-size:13px;'><b>Notre imagination est notre seule limite</b></span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='background:#000000;background-color:#000000;margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#000000;background-color:#000000;width:100%;'><tbody><tr><td style='border:0px solid #ffffff;direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-left:0px;padding-right:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:23px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><h1 class='text-build-content' data-testid='i13fCPElEi79' style='margin-top: 10px; margin-bottom: 10px; font-weight: normal;'><span style='color:#ffffff;font-family:Montserrat;font-size:23px;'>
    <b>Merci de votre intérêt pour notre Flyer !</b></span></h1></div></td></tr><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:15px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' data-testid='N-j5YmirOz9r' style='margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;line-height:22px;'>Vous y découvrirez les formations et solutions digitales que nous vous proposons afin de renforcer et booster les capacités de votre équipe</span></p></div></td></tr><tr><td align='left' style='font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:15px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0; margin-top: 10px;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Nous restons joignables au :&nbsp;</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'>&nbsp;</p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Burkina Faso 🇧🇫 | +226 75 30 30 75</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Sénégal 🇸🇳 | +221 77 416 69 69</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Côte d'Ivoire 🇨🇮 | +225 01 41 18 05 05</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0; margin-bottom: 10px;'>&nbsp;</p></div></td></tr><tr><td align='center' vertical-align='middle' style='font-size:0px;padding:10px 25px 10px 25px;padding-right:25px;padding-left:25px;word-break:break-word;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='border-collapse:separate;line-height:100%;'><tr><td align='center' bgcolor='#003cc9' role='presentation' style='border:0px solid #ffffff;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px 10px 25px;background:#003cc9;' valign='middle'><p style='display:inline-block;background:#003cc9;color:#ffffff;font-family:Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px 10px 25px;mso-padding-alt:0px;border-radius:3px;'><span style='font-family:Montserrat;font-size:14px;'><b>
      <a class='fa fa-download' style='color:white;' href='https://training.illimitis.com/illimitis/$doc' download>
    Cliquez ici pour Télécharger 
        <embed src='https://training.illimitis.com/illimitis/$doc' width=500 height=500 type='application/pdf'/>
    </a></b></span></p></td></tr></table></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'><tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:center;color:#55575d;font-family:Arial;line-height:22px;'><a href='[[UNSUB_LINK_EN]]' style='color:inherit;text-decoration:none;' target='_blank'></a></span></p></div></td></tr><tr><td align='left' style='font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:center;color:#55575d;font-family:Arial;line-height:22px;'></span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><![endif]--></div></body></html>";
                                            
               $headers = "From: info@illimitis.com" . "\r\n" 
                                
                                ."Content-Type:text/html;charset=\"utf-8\"";
                                
               mail($to,$subject,$body,$headers);
               
          
            
            
                echo '<br><br><br> <span class="alert alert-success" role="alert" style ="margin-top : 100px; margin-left : 150px; width : 350px;"> Les Mails ont été envoyés avec succès </span>';
           
            return redirect('/page_okfl')->with(['message' => $message]);

        }
        else
        {
            flash('user not saved')->error();

        }
        
        }
        return redirect('/page_okfl')->with(['message' => $message]);
    }

     public function page_okfl()

    {
        return view('illimitis.page_okfl');

    }
    
    public function page_ok()

    {
        return view('illimitis.page_ok');

    }
    
    public function page_okins()

    {
        return view('illimitis.page_okins');

    }
    public function formation()

    {
        return view('illimitis.formations');

    }

    public function inovation()

    {
        return view('illimitis.inovation');

    }

    public function contact()

    {

        return view('illimitis.contacts');

    }
    
    public function send_contact(Request $request)

    {

          $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            //'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        
        $messages = "Message envoyé avec succès !";
        //margareth.o@illimitis.com,
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $req = "Requête en ligne | ";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $destinataire = DB::table('destinataires')->select('destinataires.email')->where('destinataires.email', '=', 'axel.n@illimitis.com')  ->get();
      
         $to = "marketing@illimitis.com, info@illimitis.com";

        $subject = $req  . "  " .  $_POST['subject'];
        $body = "<!doctype html><html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head><title>ILLIMITIS</title><!--[if !mso]><!-- --><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]--><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta name='viewport' content='width=device-width,initial-scale=1'><style type='text/css'>#outlook a { padding:0; }
          body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
          table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
          img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
          p { display:block;margin:13px 0; }</style><!--[if mso]>
        <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]--><!--[if lte mso 11]>
        <style type='text/css'>
          .mj-outlook-group-fix { width:100% !important; }
        </style>
        <![endif]--><!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'><link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'><style type='text/css'>@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
@import url(https://fonts.googleapis.com/css?family=Montserrat);</style><!--<![endif]--><style type='text/css'>@media only screen and (min-width:480px) {
        .mj-column-per-67 { width:67% !important; max-width: 67%; }
.mj-column-per-33 { width:33% !important; max-width: 33%; }
.mj-column-per-100 { width:100% !important; max-width: 100%; }
      }</style><style type='text/css'>[owa] .mj-column-per-67 { width:67% !important; max-width: 67%; }
[owa] .mj-column-per-33 { width:33% !important; max-width: 33%; }
[owa] .mj-column-per-100 { width:100% !important; max-width: 100%; }</style><style type='text/css'>@media only screen and (max-width:480px) {
      table.mj-full-width-mobile { width: 100% !important; }
      td.mj-full-width-mobile { width: auto !important; }
    }</style></head><body style='background-color:#F4F4F4;'><div style='background-color:#F4F4F4;'><!--[if mso | IE]>
    <table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' >
    <tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]-->
    <div style='margin:0px auto;max-width:600px;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'>
    <tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:402px;' ><![endif]--><div class='mj-column-per-67 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 0px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='margin: 10px 0;'></p></div></td></tr></table></div><!--[if mso | IE]></td><td class='' style='vertical-align:top;width:198px;' ><![endif]--><div class='mj-column-per-33 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 0px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: right; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:right;color:#55575d;font-family:Arial;line-height:22px;'><a href='[[PERMALINK]]' style='color:inherit;text-decoration:none;' target='_blank'>View online version</a></span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'><tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='center' style='background:#9c9595;font-size:0px;padding:10px 25px 10px 25px;padding-right:25px;padding-left:25px;word-break:break-word;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='border-collapse:collapse;border-spacing:0px;'><tbody><tr><td style='width:550px;'><img alt='' height='auto' src='https://xtxky.mjt.lu/tplimg/xtxky/b/s3t8y/61vw0.png' style='border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;' width='550'></td></tr></tbody></table></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='background:#000000;background-color:#000000;margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#000000;background-color:#000000;width:100%;'><tbody><tr><td style='border:0px solid #ffffff;direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-left:0px;padding-right:0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:23px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><h1 class='text-build-content' data-testid='i13fCPElEi79' style='margin-top: 10px; margin-bottom: 10px; font-weight: normal;'><span style='color:#ffffff;font-family:Montserrat;font-size:23px;'><b>Merci de nous avoir contacté !</b></span></h1></div></td></tr><tr><td align='left' style='font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' data-testid='N-j5YmirOz9r' style='margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Notre équipe commerciale vous contactera dans de plus brefs délais !</span></p></div></td></tr><tr><td align='left' style='font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:15px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0; margin-top: 10px;'><span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Nous restons joignables au :&nbsp;</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'>&nbsp;</p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'>
    <span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Burkina Faso 🇧🇫 | +226 75 30 30 75</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'>
    <span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Sénégal 🇸🇳 | +221 77 416 69 69</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0;'>
    <span style='color:#ffffff;font-family:Montserrat;font-size:15px;'>Côte d'Ivoire 🇨🇮 | +225 01 41 18 05 05</span></p><p class='text-build-content' data-testid='x1-FjIr9C' style='margin: 10px 0; margin-bottom: 10px;'>&nbsp;</p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><table align='center' border='0' cellpadding='0' cellspacing='0' class='' style='width:600px;' width='600' ><tr><td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'><![endif]--><div style='margin:0px auto;max-width:600px;'><table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='width:100%;'><tbody><tr><td style='direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;'><!--[if mso | IE]><table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td class='' style='vertical-align:top;width:600px;' ><![endif]--><div class='mj-column-per-100 mj-outlook-group-fix' style='font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;'><table border='0' cellpadding='0' cellspacing='0' role='presentation' style='vertical-align:top;' width='100%'><tr><td align='left' style='font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:center;color:#55575d;font-family:Arial;line-height:22px;'>This e-mail has been sent to [[EMAIL_TO]], <a href='[[UNSUB_LINK_EN]]' style='color:inherit;text-decoration:none;' target='_blank'>click here to unsubscribe</a>.</span></p></div></td></tr><tr><td align='left' style='font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-bottom:0px;word-break:break-word;'><div style='font-family:Arial, sans-serif;font-size:13px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;'><p style='text-align: center; margin: 10px 0; margin-top: 10px; margin-bottom: 10px;'><span style='font-size:13px;text-align:center;color:#55575d;font-family:Arial;line-height:22px;'>   SN</span></p></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><![endif]--></div>
    </body></html>";
    
    $header = "From: ".$email."\r\n";
    $header .= "Cc: ".$email."\n";
    $header .= "Reply-To : ".$email."\r\n";
    $header .= "Return-Path : ".$email."\r\n";
    $header .= "X-Mailer: PHP\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
    
    
    if(mail($to, $subject, $message, $header))
    {
      echo "Mail Sent Successfully";
    }else{
      echo "Mail Not Sent";
    }

      
          
            
            
                echo '<br><br><br> <span class="alert alert-success" role="alert" style ="margin-top : 100px; margin-left : 150px; width : 350px;"> Les Mails ont été envoyés avec succès </span>';
           

        return back()->with(['messages' => $messages]);

    }
    
    
    
}

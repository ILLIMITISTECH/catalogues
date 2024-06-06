<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Sendemail;
use Session;

class MailManuController extends Controller
{
    //

    public function contact()
    {   
        return view('admin.dashboard_responsable');
    }

    public function sendemail(Request $get)
    {
        $this->validate($get, [
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);

        $name = $get->name;
        $email = $get->email;
        $subject = $get->subject;
        $message = $get->message;

        Mail::to($email)->send(new Sendemail($subject, $message));
        Session::flash("success");
        return back();

    }
}

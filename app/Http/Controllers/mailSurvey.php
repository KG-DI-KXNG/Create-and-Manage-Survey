<?php

namespace App\Http\Controllers;

// use App\Mail\surveyMailing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailSurvey extends Controller
{
    public function sendmail(Request $request){
        $request->validate([
            'email'=>'required',
            'url'=>'required',
        ]);

        date_default_timezone_set('America/Cayman');
        
        $data = [
          'fullname' => $request->name,
          'email' => $request->email,
          'msg' => $request->url,
          'date' => date("Y-m-d H:i:s"),
        ];

        Mail::send('email.email', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject('Survey----From: '.$data['email']);
        });

        return back()->with('success','Successfully Sent');
    }

    
}

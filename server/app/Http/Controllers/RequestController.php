<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Request as req;
use Illuminate\Support\Facades\Mail;
use App\ContentActions;

class RequestController extends Controller
{  
  public function index()
  {    	
  	return view('home',[
      'requests' => req::all()
    ]);
  }  
  public function requests()
  {    	
  	$requests = req::all();
  	foreach($requests as $request){
      $request->book ?? $request->article ?? $request->video;
    }

  	return $requests;
  }
  public function performRequest(Request $request)
  {        
    $actions = new ContentActions($request);    
    return $actions->contentActions[$request['request']['type']]();
  }
  public function mail($user,$email)
  {        
    return view('mail',[
      'user' => $user,
      'email' => $email
    ]);
  }
  public function sendEmail(Request $request)
  {
    $rules = [
      "email" => 'required|email',
      "sender" => 'required',
      'to' => 'required',
      "subject" => 'required',
      "message" => 'required'
    ];
    $valid = \Validator::make($request->all(),$rules);

    if($valid->fails()) return redirect()->back()->withErrors($valid->errors());
    
    file_put_contents('/home/passionary/Desktop/contentmaker/bookmaker-server/resources/views/message.blade.php',$request->message);    
      Mail::send(['text' => 'message'],['name','name'],function($message) use($request){
        $message->from(env('MAIL_USERNAME'),$request->sender);
        $message->to($request->email,$request->to)->subject($request->subject ?? '');
      });          
      return redirect()->back()->with('message','your message was send.');
  }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\User;

class AccessTokenController extends Controller
{
  public function authenticated(Request $request)
  {    	
  	if(null!=($user = User::where('api_token',$request->token)->first())) 
      return ['token' => $user->api_token];
    else
      return ['token' => false];
  }
}

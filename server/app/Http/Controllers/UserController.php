<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
  public function registr(Request $request)
  {  	
  	$rules = [
  		'name' => 'required',
  		'email' => 'required',
  		'password' => 'required'
  	];
  	$valid = \Validator::make($request->all(),$rules);
  	if($valid->fails()) return response()->json(['errors',$valid->errors()->all()]);
  	$user = User::create([
      'username' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'api_token' => Str::random(60)
    ]);  	

  	return [
      'token' => $user->api_token
    ];
  }
  public function login(Request $request)
  {            
  	if(null!=($user = User::where('email',$request->email)->first()) && Hash::check($request->password,$user->password)) {
       $token = Str::random(60);

        $user->api_token = $token;
        $user->save();

        return ['token' => $token];
  	}
    
  	return response()->json(['message' => 'invalid data'],401);
  }
  public function logout(Request $request)
  {
    if(null!=($user = User::where('api_token',$request->token)->first())){
      $user->api_token = null;
      $user->save();

      return response()->json(['message'=>'logout success'],200);
    }

    return response()->json(['message' => 'user not found'],401);
  }
  public function user(Request $request)
  {
    return User::where('api_token',$request->token)->first();
  }
}

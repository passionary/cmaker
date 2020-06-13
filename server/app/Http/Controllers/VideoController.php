<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Request as req;

class VideoController extends Controller
{
  public function getVideo($request,$id)
  {
  	return view('video',[
  		'request' => req::find($request),
  		'video' => Video::find($id)
  	]);
  }
  public function getByNameVideo($name){
  	return Video::where('name',$name)->first();
  }
}

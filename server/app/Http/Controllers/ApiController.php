<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as req;

class ApiController extends Controller
{
  public function requests(Request $request)
  {
  	$items = [];
  	$r = req::where([['user_id','=',$request->user_id],['type','=',$request->type]])->get();
		foreach($r as $item) {
			if($item->type == 'book') {
				$item[$item->type]->pages;	
			}
			$items[] = $item[$item->type];
		}

		return $items;
  }
}

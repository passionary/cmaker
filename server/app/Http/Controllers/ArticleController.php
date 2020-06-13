<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Article;
use App\Request as req;

class ArticleController extends Controller
{
  public function getArticle($request,$id)
  {
  	$article = Article::find($id);  	
  	return view('article',[
  		'request' => req::find($request),
  		'article' => $article
  	]);
  }  
}

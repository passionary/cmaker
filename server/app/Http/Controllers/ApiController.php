<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as req;
use App\Book;
use App\Article;
use App\Page;
use App\Video;

class ApiController extends Controller
{
  public function requests(Request $request)
  {
  	switch($request->type) {
  		case 'book': 
  		$items = Book::where('user_id',$request->user_id)->get();
  		foreach($items as $item) $item->pages;
  		break;
  		case 'article': 
  		$items = Article::where('user_id',$request->user_id)->get();
  		break;
  		case 'video': 
  		$items = Video::where('user_id',$request->user_id)->get();
  		break;
  	}		
  	foreach($items as $item) {
  		$item->request;
  	}
		return $items;
  }
  public function saveArticle(Request $request)
  {
  	$article = Article::find($request->id);
  	$article->content = $request->content ?? '';
  	$article->save();

  	return response()->json(['message' => 'your changes was saved'],200);
  }
  public function createArticle(Request $request)
  {
  	$article = Article::create($request->all());

  	$req = req::create();
  	$article->request_id = $req->id;
  	$article->save();

  	return response()->json(['id' => $article->id],200);
  }
  public function createBook(Request $request)
  {
  	$rpages = json_decode($request->pages,true);
  	$pages = array_reduce($rpages, function($carry,$item) {
  		return array_merge($carry,$item);
  	},[]);
  	$book = Book::create($request->all());
  	for($i=0;$i<count($pages);$i++) {
  		$body = [];
  		$body['content'] = $pages[$i]['content'];
  		$body['order_id'] = $i + 1;
  		$body['book_id'] = $book->id;
  		$book->pages()->save(Page::create($body));
  	}
  	$req = req::create();
  	$book->request_id = $req->id;
  	$book->save();

  	return response()->json(['id' => $book->id],200);
  }
  public function saveBook(Request $request)
  {
  	$rpages = json_decode($request->pages,true);
  	$pages = array_reduce($rpages, function($carry,$item) {
  		return array_merge($carry,$item);
  	},[]);
  	$book = Book::find($request->id);
		for($i=0;$i<count($pages);$i++) {
			if(isset($book->pages[$i])) {
				$book->pages[$i]->content = $pages[$i]['content'];
				$book->pages[$i]->save();
			}else {
				$body = [];
				$body['content'] = $pages[$i]['content'];
				$body['order_id'] = $i + 1;
				$body['book_id'] = $book->id;
				$book->pages()->save(Page::create($body));
			}		
  	}
  	return $book->pages;
  }
  public function removeBook(Request $request)
  {
  	$book = Book::find($request->book_id);
  	req::find($book->request_id)->delete();
  	$book->delete();
  	
  	return response()->json(['message' => 'your book deleted successfully'],200);
  }
  public function removeArticle(Request $request)
  {
  	$article = Article::find($request->article_id);
  	req::find($article->request_id)->delete();
  	$article->delete();

  	return response()->json(['message' => 'your article deleted successfully'],200);
  }
  public function removeVideo(Request $request)
  {
  	$video = Video::find($request->video_id);
  	req::find($video->request_id)->delete();
  	$video->delete();

  	return response()->json(['message' => 'your video deleted successfully'],200);
  }
}

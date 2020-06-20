<?php 
namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ContentActions extends Action
{	
	public $contentActions;
	public function __construct(Request $request)
	{		
		parent::__construct('book',function() use($request){
			$rules = [
				'type' => 'required',
				'email' => 'required',
				'message' => 'required',
				'author' => 'required',
			];
			$rules2 = [
				'genre' => 'required',
				'name' => 'required',
				'content' => 'required',
				'size' => 'required',
				'count_of_pages' => 'required',
				'tags' => 'required',
			];
			$requestValid = \Validator::make($request['request'],$rules);
			$itemValid = \Validator::make($request['item'],$rules2);
			if($requestValid->fails() || $itemValid->fails()) return response()->json(['message' => 'invalid data'],400);
			$req = \App\Request::create($request['request']);
			$result = Book::create([
				'genre' => $request['item']['genre'],
				'name' => $request['item']['name'],
				'size' => $request['item']['size'],
				'count_of_pages' => $request['item']['count_of_pages'],
				'tags' => $request['item']['tags'],
				'request_id' => $req->id
			]);
			$book = json_decode($request['item']['content'],true);
			$order = 0;
			foreach($book as $arr_b) {
				foreach($arr_b as $b) {
					$order++;
					\App\Page::create([
						'content' => $b['cont'],
						'book_id' => $result->id,
						'order_id' => $order
					]);				
				}				
			}									
			return response()->json(['message' => 'your book was sent successfully'],200);
		});
		parent::__construct('article',function() use($request){	
			$rules = [
				'type' => 'required',
				'message' => 'required',
				'email' => 'required',
				'author' => 'required',
			];
			$rules2 = [
				'subject' => 'required',
				'name' => 'required',
				'content' => 'required',
				'tags' => 'required',				
			];
			$requestValid = \Validator::make($request['request'],$rules);
			$itemValid = \Validator::make($request['item'],$rules2);
			if($requestValid->fails() || $itemValid->fails()) return response()->json(['message' => 'invalid data'],400);
			$req = \App\Request::create($request['request']);
			$article = Article::create([
				'subject' => $request['item']['subject'],
				'name' => $request['item']['name'],
				'content' => $request['item']['content'],
				'tags' => $request['item']['tags'],
				'request_id' => $req->id
			]);
			return response()->json(['message' => 'your article was sent successfully'],200);
		});
		parent::__construct('video',function() use($request){
			$rules = [
				'type' => 'required',
				'message' => 'required',
				'email' => 'required',
				'author' => 'required',
			];
			$rules2 = [
				'name' => 'required',				
				'tags' => 'required',							
			];				
			$requestValid = \Validator::make($request['request'],$rules);
			$itemValid = \Validator::make($request['item'],$rules2);			
			if($requestValid->fails() || $itemValid->fails()) return response()->json(['message' => 'invalid data'],400);
			$req = \App\Request::create($request['request']);
			$path = Storage::disk('public')->putFile('videos',$request->file('file'));	
			$video = Video::create([
				'name' => $request['item']['name'],				
				'path' => $path,
				'tags' => $request['item']['tags'],
				'request_id' => $req->id
			]);
			return response()->json(['message' => 'your video was sent successfully','video' => $video->path],200);
		});
		$this->contentActions = $this->actions;
	}
}
?>
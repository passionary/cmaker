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
				'size' => 'required',
				'count_of_pages' => 'required',
				'tags' => 'required',
			];
			$requestValid = \Validator::make($request['request'],$rules);
			$itemValid = \Validator::make($request['item'],$rules2);
			if($requestValid->fails() || $itemValid->fails()) return response()->json(['errors' => $itemValid->errors(),'errors2' => $requestValid->errors()]);
			$book = Book::find($request->book_id);
			foreach($request['item'] as $key => $value) {
				$book[$key] = $value;
				$book->save();
			}
			$req = \App\Request::find($book->request_id);
			foreach($request['request'] as $key => $value){
				$req[$key] = $value;
				$req->save();
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
			if($requestValid->fails() || $itemValid->fails()) return response()->json(['errors' => $itemValid->errors(),'errors2' => $requestValid->errors()]);
			$article = Article::find($request->article_id);
			foreach($request['item'] as $key => $value) {
				$article[$key] = $value;
				$article->save();
			}	
			$req = \App\Request::find($article->request_id);
			foreach($request['request'] as $key => $value){
				$req[$key] = $value;
				$req->save();
			}
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
			if($requestValid->fails() || $itemValid->fails()) return response()->json(['errors' => $itemValid->errors(),'errors2' => $requestValid->errors()]);
			if($request->video_id && isset($request->video_id) && $request->video_id !== "false" && strlen($request->video_id) >= 1) {
				$video = Video::find($request->video_id);
				foreach($request['item'] as $key => $value) {
					$video[$key] = $value;
					$video->save();
				}	
				$req = \App\Request::find($video->request_id);
				foreach($request['request'] as $key => $value){
					$req[$key] = $value;
					$req->save();
				}
				return response()->json(['message' => 'your request was updated successfully','id' => $video->id],200);
			}
			$req = \App\Request::create($request['request']);
			$path = Storage::disk('public')->putFile('videos',$request->file('file'));
			$video = Video::create([
				'name' => $request['item']['name'],				
				'path' => $path,
				'user_id' => $request->user_id,
				'tags' => $request['item']['tags'],
				'request_id' => $req->id
			]);
			return response()->json(['message' => 'your video was sent successfully','id' => $video->id],200);
		});
		$this->contentActions = $this->actions;
	}
}
?>
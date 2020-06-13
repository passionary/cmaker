<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Request as req;

class BookController extends Controller
{
    public function getBook($request,$id)
    {    	    	
    	$book = Book::find($id);
    	$book->pages;
    	return view('book',[
    		'request' => req::find($request),
    		'book' => $book
    	]);
    }
}

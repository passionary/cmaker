@extends('layouts.app')
@section('content')
	<div class="">
		<h2 class="text-center">{{$book->name}}</h2>
		@foreach($book->pages as $page)
	    <div class="card request medium mx-auto">
	      <div class="card-content">
	        <h5 class="">{{$page->content}}</h5>
	      </div>      
	    </div>
	  @endforeach
	</div>
@endsection
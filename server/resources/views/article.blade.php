@extends('layouts.app')
@section('content')
	<div class="">
		<h2 class="text-center">{{$article->name}}</h2>
    <div class="card request large mx-auto">
      <div class="card-content">
        <h5 class="">{{$article->content}}</h5>
      </div>      
    </div>
	</div>
@endsection
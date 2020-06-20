@extends('layouts.app')
@section('content')
	<div class="green lighten-3 center-align"><span>{{session('message')}}</span></div>
	<h3 class="text-center">Mail send</h3>
	<form id="form" action="{{route('send-email')}}" method="post" class="w-75 mx-auto ">
		{{csrf_field()}}
	  <input type="text" name="sender" placeholder="Sender">
	  <input type="text" name="to" placeholder="To" value="{{$email}}">
	  <input type="text" name="subject" placeholder="Subject">
	  <textarea name="message" class="materialize-textarea" placeholder="message">
	  </textarea>
	  <input type="submit" class="btn cyan">
	</form>
@endsection

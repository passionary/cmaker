@extends('layouts.app')
@section('content')
	<video src="{{'http://127.0.0.1:8000/storage/' . $video->path}}" controls=""></video>
@endsection
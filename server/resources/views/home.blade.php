@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-between flex-wrap">
  @foreach($requests as $request)
    <div class="card request medium" style="min-width: 290px;">
      <div class="card-image">
        @if($request->type === 'book')
          <img src="/images/icons8-open-book-96.png">
        @elseif($request->type === 'article')
          <img src="/images/icons8-edit-file-80.png" style="margin-top:25px;width: 60% !important;">
        @elseif($request->type === 'video')
          <img src="/images/icons8-video-gallery-96.png">
        @endif
      </div>
      <div class="card-content">
        <h5 class="">{{$request->message}}</h5>
      </div>
      <div class="card-action">
        @if(null!=($request->type) && null!=($request->email))
          <a href="{{route($request->type,[
              'request' => $request->id,
              'id' => $request[$request->type]
            ])}}">
            {{$request->author}}
          </a>
          <a href="{{route('email',['email' => $request->email])}}">{{$request->email}}
          </a>
        @endif
      </div>
    </div>
  @endforeach
</div>
@endsection

@extends('layouts.main')

@section('content')
@foreach($posts as $post)
<div>
  <div class="border-bottom mb-3">
    <h2>{{$post->title}}<small class="text-muted pl-2">Programming</small></h2>
    <p class="lead">by <a href="#">{{$post->author}}</a></p>
    <p> <span>Posted on</span>  {{$post->created_at}}</p>
  </div>

  <div class="card mb-3">
    <img src="{{$post->img}}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">{{$post->body}}</p>
      <a href="{{route('post.show',['post'=>$post->id])}}" class="btn btn-primary">Read more</a>
    </div>
  </div>
</div>
@endforeach

@endsection
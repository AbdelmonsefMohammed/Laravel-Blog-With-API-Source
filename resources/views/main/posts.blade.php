@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
        @foreach($posts as $p)
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{$p->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->title}}</h5>
                        <p class="card-text">{{$p->body}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@stop
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
               
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Img</th>
                            <th scope="col">Author</th>
                            <th scope="col">Trash</th>
                            <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $p)
                            <tr>
                                <th scope="row">{{$p->id}}</th>
                                <td>{{$p->title}}</td>
                                <td><img src="{{asset($p->img)}}" alt="this is image" width='50px'></td>
                                <td>{{$p->author}}</td>
                                <td><a href="{{route('PostsTrash',['id'=>$p->id])}}" class='btn btn-danger'>Trash</a></td>
                                <td><a href="{{route('PostsEdit',['id'=>$p->id])}}" class='btn btn-primary'>Update</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

@stop
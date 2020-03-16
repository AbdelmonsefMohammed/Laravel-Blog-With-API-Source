@extends('layouts.app')
@section('content')

<div class="panel panel-default">
                <div class="panel-heading font-weight-bold">Posts</div>

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
                            <th scope="col">Category</th>
                            <th scope="col">Trash</th>
                            <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td><img src="{{asset($post->img)}}" alt="this is image" width='50px'></td>
                                <td>{{$post->author}}</td>
                                <td>{{$post->categories->name}}</td>
                                <td><a href="{{route('posts.trash',['id'=>$post->id])}}" class='btn btn-danger'>Trash</a></td>
                                <td><a href="{{route('posts.edit',['id'=>$post->id])}}" class='btn btn-primary'>Update</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

@stop
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
                    
               
                    <form action="{{route('Postsupdate',['id'=>$post->id])}}" method='post' enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name='title' type="text" class="form-control" placeholder='Enter Post Title' value='{{$post->title}}' required>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input name='img' type="file" class="form-control" placeholder='Enter Post Title' value='{{$post->img}}'>
                        </div>

                        <div class="form-group">
                            <img src="{{asset($post->img)}}" alt="" width='50px'>
                        </div>
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea class='form-control' name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Author</label>
                            <input name='author' type="text" class="form-control" placeholder='Enter Author Name' value='{{$post->author}}' required>
                        </div>

                        <input type="submit" class='btn btn-primary btn-block'>
                    
                    </form>
                
                </div>

            </div>

@stop
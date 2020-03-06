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
                    
               
                    <form action="{{route('post_insert')}}" method='post' enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name='title' type="text" class="form-control" placeholder='Enter Post Title' required>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input name='img' type="file" class="form-control" placeholder='Enter Post Title' required>
                        </div>


                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea class='form-control' name="body" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Author</label>
                            <input name='author' type="text" class="form-control" placeholder='Enter Author Name' required>
                        </div>

                        <input type="submit" class='btn btn-primary btn-block'>

                    
                    </form>
                
                </div>

            </div>

@endsection
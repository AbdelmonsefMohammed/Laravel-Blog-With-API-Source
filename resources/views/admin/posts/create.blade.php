@extends('layouts.app')

@section('content')

<div class="panel panel-default">
                <div class="panel-heading font-weight-bold">Create Post</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
               
                    <form action="{{route('posts.store')}}" method='post' enctype="multipart/form-data">
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
                        
                        <div class="form-group">
                            <label for="company_id">Category</label>
                            <select name="cat_id" id="company_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" class='btn btn-primary btn-block'>

                    
                    </form>
                
                </div>

            </div>

@endsection
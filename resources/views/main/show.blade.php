@extends('layouts.main')

@section('content')

    <div>
        <div class="mb-3">
            <h2>{{$post->title}}<small class="text-muted pl-2">Programming</small></h2>
            <p class="lead">by <a href="#">{{$post->author}}</a></p>
            <p> <span>Posted on</span> {{$post->created_at}}</p>

            <img src="{{$post->img}}" alt="" class="w-100">
            <hr>
            <p>{{$post->body}}</p>



            <form action="">
                <div class="card bg-light">
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Leave a Comment:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="send">Submit</button>
                    </div>
                
                </div>
            </form>
            <hr>
            <div class="media pt-3">
                <img class="mr-3" src="http://placehold.it/64x64" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    Cras sit amet nibh libero, Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <div class="media pt-3">
                <img class="mr-3" src="http://placehold.it/64x64" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    Cras sit amet nibh libero, Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>


    </div>
@stop
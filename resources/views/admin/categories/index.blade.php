@extends('layouts.app')
@section('content')

<div class="panel panel-default">
                <div class="panel-heading font-weight-bold">Categories</div>

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
                            <th scope="col">Name</th>
                            <th scope="col">Show</th>
                            <th scope="col">Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td><a href="{{route('categories.show',['id'=>$category->id])}}" class='btn btn-success'>Show</a></td>
                                <td><a href="{{route('categories.trash',['id'=>$category->id])}}" class='btn btn-danger'>Trash</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

@stop
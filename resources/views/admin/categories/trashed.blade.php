@extends('layouts.app')
@section('content')

<div class="panel panel-default">
                <div class="panel-heading font-weight-bold">Trashed Categories</div>

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
                            <th scope="col">Delete</th>
                            <th scope="col">Restore</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trash as $cat)
                            <tr>
                                <th scope="row">{{$cat->id}}</th>
                                <td>{{$cat->name}}</td>
                                <td><a href="{{route('categories.delete',['id'=>$cat->id])}}" class='btn btn-danger'>Delete</a></td>
                                <td><a href="{{route('categories.restore',['id'=>$cat->id])}}" class='btn btn-primary'>Restore</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

@stop
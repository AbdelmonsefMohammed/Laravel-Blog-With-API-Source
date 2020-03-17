@extends('layouts.app')

@section('content')

<div class="panel panel-default">
                <div class="panel-heading font-weight-bold">Create Category</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
               
                    <form action="{{route('categories.store')}}" method='post'>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name='name' type="text" class="form-control" placeholder='Enter Category name' required>
                        </div>

                        <input type="submit" class='btn btn-primary btn-block'>

                    
                    </form>
                
                </div>

            </div>

@endsection
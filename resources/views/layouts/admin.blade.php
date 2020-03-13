@extends('layouts.app')
@section('adminlayout')
<div class="container">
            <div class="row">
                @auth

                
                <div class="col-lg-4">
                    <ul class='list-group'>
                        <li class='list-group-item'>
                            <a href="{{route('CreatePost')}}">Create Post</a>
                        </li>
                        <li class='list-group-item'>
                            <a href="{{route('indexPost')}}">Show Post</a>
                        </li>

                        <li class='list-group-item'>
                            <a href="{{route('PostsTrashed')}}">Trashed Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('register') }}">Create user</a>
                        </li>


                    </ul>
                </div>
                
                @endauth

                <div class="col-lg-8">
                @yield('content')
                </div>
            </div>
        </div>
@endsection
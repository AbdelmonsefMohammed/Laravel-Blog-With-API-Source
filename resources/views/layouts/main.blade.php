<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    

    <!-- Styles -->

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <h2> {{ config('app.name', 'Blog') }} </h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="  "
                 data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                 aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                </div>
            </div>
        </nav>


    <div class="container">
        <div class="row mt-3">
            <div class="col-8">

                @yield('content')
            
            </div>
            <div class="col-4">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header bg-light font-weight-bold">
                        Categories
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                    <a href="{{route('category.show',['category'=>$category->id])}}"><li class="list-group-item bg-light">{{$category->name}}</li></a>
                        @endforeach
                    </ul>
                </div>
                <div class="card mt-3 bg-light">
                    <div class="card-body ">
                        <h5 class="card-title">About</h5>
                        <p class="card-text">This is a simple CMS blog website that displays
                        articles that belongs to various categories and fully managed from admin page</p>
                    </div>
                </div>
            </div>

        </div>
            <footer>
                <hr>
            <div class="row justify-content-center mt-3 pb-3">
                <div>
                    Copyright &copy; Website 2020
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    </div>
    
    


    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>

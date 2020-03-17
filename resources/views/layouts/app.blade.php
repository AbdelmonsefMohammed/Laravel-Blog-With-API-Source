<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>
    
            <div class="sidebar-header">
                <h3>Control  Sidebar</h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="#catSubmenu" data-toggle="collapse" aria-expanded="false">Categories</a>
                    <ul class="collapse list-unstyled" id="catSubmenu">
                        <li>
                            <a href="{{route('categories.index')}}">Show Categories</a>
                        </li>
                        <li>
                            <a href="{{route('categories.create')}}">Create Category</a>
                        </li>
                        <li>
                            <a href="{{route('categories.trashed')}}">Trashed Categories</a>
                        </li>
                    </ul>
                    <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false">Posts</a>
                    <ul class="collapse list-unstyled" id="postSubmenu">
                        <li>
                            <a href="{{route('posts.show')}}">Show Posts</a>
                        </li>
                        <li>
                            <a href="{{route('posts.create')}}">Create Post</a>
                        </li>
                        <li>
                            <a href="{{route('posts.trashed')}}">Trashed posts</a>
                        </li>
                    </ul>
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false">Users</a>
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="#">test</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Create User</a>
                        </li>
                        <li>
                            <a href="#">test</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>

        <!-- END OF SIDE NAV BAR -->

        <!-- Page Content  -->
        
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    @auth
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    @endauth
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto"
                     type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    </div>
                </div>
            </nav>
       
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                @yield('content')
                </div>
            </div>
        </div>

        
        
    </div>
    <div class="overlay"></div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>

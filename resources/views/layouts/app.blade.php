<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'pMANAGER') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top" style="background-color:#000;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white;">
                    {{ config('app.name', 'pMANAGER') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" style="color:white;" href="{{ route('login') }}" >Login</a></li>
                            <li><a class="nav-link" style="color:white;" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('companies.index') }}" style="color:white;"><i class="fa fa-building" aria-hidden="true"></i> My Companies</a></li>
                            <li><a class="nav-link" href="{{ route('projects.index') }}" style="color:white;">Projects</a></li>
                            <li><a class="nav-link" href="{{ route('tasks.index') }}" style="color:white;">Tasks</a></li>

                        @if(Auth::user()->role_id == 1)
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin Panel <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role ="menu" aria-labelledby="navbarDropdown">
                                    <li><a class="nav-link" href="{{ route('projects.index') }}">All Projects</a></li>
                                    <li><a class="nav-link" href="{{ route('tasks.index') }}">All Tasks</a></li>
                                    <li><a class="nav-link" href="{{ route('companies.index') }}">All Companies</a></li>
                                    <li><a class="nav-link" href="{{ route('users.index') }}">All Users</a></li>
                                    <li><a class="nav-link" href="{{ route('roles.index') }}">All Roles</a></li>
                                </ul>
                            </li>
                        @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.show',[Auth::user()->id]) }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

                    <main class="py-4">
                        @include('partials.messages')
                                @yield('content')
                    </main>
                
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/main.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
   
</body>
</html>

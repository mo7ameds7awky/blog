<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        <div class="container">
            <div class="row">
                @if (Auth::check())
                    <div class="col-lg-4">
                        <div class="list-group">
                            <a href="{{route('home')}}" class="list-group-item list-group-item-action">Home</a>
                            <a href="{{route('categories')}}" class="list-group-item list-group-item-action">Categories</a>
                            <a href="{{route('categories.create')}}" class="list-group-item list-group-item-action">Create New Category</a>
                            <a href="{{route('tags')}}" class="list-group-item list-group-item-action">Tags</a>
                            <a href="{{route('tags.create')}}" class="list-group-item list-group-item-action">Create New Tag</a>
                            <a href="{{route('posts')}}" class="list-group-item list-group-item-action">Posts</a>
                            <a href="{{route('posts.trashed')}}" class="list-group-item list-group-item-action">Trashed Posts</a>
                            <a href="{{route('posts.create')}}" class="list-group-item list-group-item-action">Create New Post</a>
                            @if (Auth::user()->admin)
                                <a href="{{route('users')}}" class="list-group-item list-group-item-action">Users</a>
                                <a href="{{route('users.create')}}" class="list-group-item list-group-item-action">Add New User</a>
                            @endif
                            <a href="{{route('profiles.edit')}}" class="list-group-item list-group-item-action">Profile</a>
                            @if (Auth::user()->admin)
                                <a href="{{route('settings')}}" class="list-group-item list-group-item-action">Website Settings</a>
                            @endif
                        </div>
                    </div>
                @endif
                <div class='col-lg'>
                    @include('inc.errors')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
    </script>
    @yield('scripts')
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IStenn</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('profiles.index')}}">
                    <img src="{{asset('svg/house-laptop.svg')}}" class="pr-3 mb-1" style="width: 50px;border-right:solid 1px #333">
                    <span class="pl-3" style="padding-left: 5px">Web-Immob</span> 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <form class="d-flex mr" style="margin-right: 190px" role="search">
                            <input  style="border-radius: 9px 9px 9px 9px;height: 35px;width: 500px" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <a href=""><img src="{{asset('svg/search.svg')}}" class="pr-3 mb-1" style="opacity: 60%;width: 35px;margin-top: 7px;margin-left: -30px"></a>
                        </form>

                        <a id="profil" class="" href="{{route('profiles.show',['user'=>Auth::user()->username])}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="rounded-circle" style="border: 3px solid #4a89ff; width: 40px;height: 40px;" src="{{ Auth::user()->profile->getImage() }}" alt="">
                        </a>
                       

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{route('profiles.show',['user'=>Auth::user()->username])}}">Voir le profil</a>

                                    <a class="dropdown-item" href="{{ route('posts.create') }}">Creer un post</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
    
      <!-- Scripts -->
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>

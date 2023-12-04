<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mladý Kóder</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/yellowrobot.ico') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('style')
    <link href="{{ asset('storage/css/tasks.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <style>
        .nav-link{
            color: white;
            font-size: 1.5em;
            margin-left: 1em;
        }
        .nav-link:hover{
            text-decoration: underline #E1E2E2;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md" style="background-color: #181818;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 2.5em; color: white; text-decoration: underline rgb(3, 252, 194);">
                    Mladý kóder
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Prihlásiť') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrácia') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="{{ request()->is('home*') ? 'nav-link active' : 'nav-link' }}" href="{{ url('/home') }}">  
                                    <img src="{{ asset('storage/home.png')}}" style="width: 15px;" alt="home">
                                    {{ __('Domov') }}
                            </a>
                            <a class="{{ request()->is('maintasks*') || request()->is('levelOne*') || request()->is('levelTwo*') || request()->is('levelThree*') || request()->is('levelBonus*') ? 'nav-link active' : 'nav-link' }}" href="{{ url('/maintasks') }}">
                                    <img src="{{ asset('storage/tasks.png')}}" style="width: 15px;" alt="tasks">
                                    {{ __('Úlohy') }}
                            </a>
                            <a class="{{ request()->is('documentation*') ? 'nav-link active' : 'nav-link' }}" href="{{ url('/documentation') }}">
                                    <img src="{{ asset('storage/documentation.png')}}" style="width: 15px;" alt="documentation">
                                    {{ __('Dokumentácia') }}
                            </a>
                            <a class="{{ request()->is('ledder*') ? 'nav-link active' : 'nav-link' }}" href="{{ url('/ledder') }}">
                                    <img src="{{ asset('storage/ledder.png')}}" style="width: 15px;" alt="ledder">
                                    {{ __('Rebríček') }}
                            </a>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odhlásiť') }}
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
    @stack('script')
</body>
</html>

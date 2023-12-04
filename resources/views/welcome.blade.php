<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mladý Kóder</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/yellowrobot.ico') }}">
        <link href="{{ asset('storage/css/styles.css') }}" rel="stylesheet" type="text/css" >
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            
        </style>
    </head>
    <body>
        <div class="navbar">
                <div class="animated-title">
                    <div class="letter">M</div>
                    <div class="letter">L</div>
                    <div class="letter">A</div>
                    <div class="letter">D</div>
                    <div class="letter">Ý</div>
                    <div class="letterSpace"> </div>
                    <div class="letter">K</div>
                    <div class="letter">Ó</div>
                    <div class="letter">D</div>
                    <div class="letter">E</div>
                    <div class="letter">R</div>
                </div>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">PROGRAMOVAŤ</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Prihlásiť sa</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrovať sa</a>
                            @endif
                        @endauth
                    </div>
                @endif
        </div>

        <div class="intro-container">
            <h1 class="intro-heading">Vitajte na stránke "Mladý kóder"!</h1>
            <p class="intro-text-white">Ak sa chceš učiť programovať je potrebné sa zaregistrovať</p>
            <p class="intro-text-white">Ak už si zaregistrovaný tak sa prihlás aby si mohol pokračovať</p>
        </div>
    </div>
    </body>
</html>

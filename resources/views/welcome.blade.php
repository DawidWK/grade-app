<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dzienniczek ucznia</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
        </style>
        <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="">
            <div class="flex flex-col h-screen justify-center items-center bg-gray-100">
                <div class="flex flex-col p-8 max-w-2xl rounded-xl shadow border border-sm bg-white">
                    <h1 class="text-2xl font-bold">Witaj w dzienniczku ucznia</h1>
                    <p class="mt-2">
                        Dzienniczek Ucznia to Twoje centrum zarządzania nauką, gdzie możesz łatwo śledzić postępy, planować zadania i osiągać cele akademickie. Zaloguj się, aby dostosować swoje doświadczenie edukacyjne lub stwórz konto, aby rozpocząć podróż do lepszej organizacji i wyników w nauce!
                    </p>
                    <a href="{{ route('login') }}" class="mt-6 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                        Zaloguj się
                    </a>
                    <a href="{{ route('register') }}" class="mt-2  inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Załóż konto
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Axelweb - Authentification</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

    </head>

    <body class="antialiased text-main">

        @include('partials._header')

        <main>
            @yield('content')
        </main>

       @livewireScripts
    </body>
</html>
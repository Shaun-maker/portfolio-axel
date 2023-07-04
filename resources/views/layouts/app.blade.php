<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

    </head>
    <body class="antialiased text-main">

        <div class="viewport">

            @include('partials._header')

            <main>
                @yield('content')
            </main>

            @include('partials._footer')

        </div>

       @livewireScripts
    </body>
</html>

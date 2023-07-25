<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Axelweb</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/home.js'])
        @livewireStyles

    </head>
    {{-- Smooth scroll body, fixed height --}}
    <body class="antialiased text-main overflow-x-hidden overflow-y-scroll">
        @include('partials._header')

        {{-- Smooth scroll viewport, fixed --}}
        {{-- Smooth scroll disable, add fixed position here ! --}}
        <div class="overflow-hidden w-full h-full inset-0 fixed">

            {{-- Smooth scroll container, absolute --}}
            <div 
                id="js-smooth-scroll" 
                class="relative overflow-hidden"
            >

                <main class="relative z-0">
                    @yield('content')
                </main>

                @include('partials._footer')

            </div>

        </div>

        @auth
            @vite(['resources/js/auth.js'])
            
            @include('partials._modals')
        @endauth

       @livewireScripts
    </body>
</html>

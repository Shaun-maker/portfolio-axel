<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

    </head>
    {{-- Smooth scroll body, fixed height --}}
    <body class="antialiased text-main overflow-x-hidden overflow-y-scroll">

        {{-- Smooth scroll viewport, fixed --}}
        <div class="fixed overflow-hidden w-full h-full inset-0">

            {{-- Smooth scroll container, absolute --}}
            <div 
                id="js-smooth-scroll" 
                class="absolute overflow-hidden"
            >

                @include('partials._header')

                <main>
                    @yield('content')
                </main>

                @include('partials._footer')

            </div>

        </div>

       @livewireScripts
    </body>
</html>

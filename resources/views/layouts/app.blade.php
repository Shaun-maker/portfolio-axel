<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta
            name="description"
            content="Portfolio Axel Paillaud : développeur web frontend freelance basé à Orléans, spécialisé en JavaScript et Vue.js, bases en PHP et Laravel"
        >

        <title>{{ config('app.name', 'Axelweb') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/home.js'])

    </head>
    {{-- Smooth scroll body, fixed height --}}
    <body class="antialiased text-main">
        @include('partials._header')

        {{-- Smooth scroll viewport, fixed --}}
        {{-- To disable smooth scroll, remove fixed position here ! --}}
        <div id="js-viewport" class="">

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

    </body>
</html>

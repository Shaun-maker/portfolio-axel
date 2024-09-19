<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta
            name="description"
            content="Portfolio Axel Paillaud : développeur web full-stack freelance basé à Orléans"
        >

        <title>{{ config('app.name', 'Axelweb') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/home.js'])

        <!-- Matomo -->
        <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//analytics.axelweb.fr/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
        </script>
        <!-- End Matomo Code -->

    </head>
    <body class="antialiased text-main relative">
        @include('partials._header')

        <main class="relative z-0">
            @yield('content')
        </main>

        @include('partials._footer')

        @auth
        @vite(['resources/js/auth.js'])

        @include('partials._modals')
        @endauth

    </body>
</html>

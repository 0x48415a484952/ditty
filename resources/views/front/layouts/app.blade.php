<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="base-url" content="{{ url('/') }}">
        <meta name="api-url" content="{{ url('/api/v1') }}">
        @widget('SeoHandler\SeoHandler')
        <link href="{{ mix('css/front/app.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body>
        <script>
            window.httpCode = parseInt('{{ isset($httpCode) ? $httpCode : 200 }}');
        </script>
        <div id="app">
            @yield('content')
        </div>
        <script src="{{ mix('js/front/app.js') }}" defer></script>

        @stack('scripts')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142575214-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-142575214-1');
        </script>

    </body>
</html>

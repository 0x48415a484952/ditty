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
        <div id="app">
            @yield('content')
        </div>
        <script src="{{ mix('js/front/app.js') }}" defer></script>

        @stack('scripts')
    </body>
</html>

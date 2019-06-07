<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="{{ mix('css/front/app.css') }}" rel="stylesheet">

        @stack('styles')
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/front/app.js') }}" defer></script>

        @stack('scripts')
    </body>
</html>

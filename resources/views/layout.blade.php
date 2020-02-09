<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lnk</title>
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v=4') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v=4') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>

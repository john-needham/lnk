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
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <h3 class="masthead-brand"><a href="/">Lnk</a></h3>
                <nav class="nav nav-masthead justify-content-center">
                </nav>
            </div>
        </header>
        @yield('content')
    </div>
</div>
</body>
</html>

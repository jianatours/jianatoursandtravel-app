<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jiana Tours & Travel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/fontawesome-free/css/all.min.css">
    <link href="/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/flickity.css">
    <link rel="stylesheet" href="/css/styles.css">
    @yield('custom-css')
</head>
<body>
    <div id="app">
        @include('partials.nav')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
        
    </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/main.js"></script>
<script src="js/flickity.js"></script>
<script src="js/custom.js"></script>
@yield('custom-js')
</html>

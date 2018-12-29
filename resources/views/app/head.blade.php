<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('app.css')
    @yield('css')
</head>
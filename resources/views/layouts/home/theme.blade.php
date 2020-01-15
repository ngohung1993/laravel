<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/theme-style.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('home/css/flatsome.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('home/css/index.min.css') }}" rel="stylesheet">

    <style>
        .home-wrapper .banner .btn-registration span {
            font-size: 13px;
            color: #fff;
            font-weight: 400;
        }

        .mm-load-more .btn-registration {
            height: 40px;
            line-height: 40px;
            font-size: 14px;
            margin: 10px 0 0;
        }

        .command {
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .menu-item {
            text-transform: uppercase;
        }
        #header{
            position: relative;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('home/js/script.js')}}"></script>
</head>
<body>
<div id="container">
    @include('layouts.home.header')

    @yield('content')

    @include('layouts.home.footer')

</div>
</body>
</html>

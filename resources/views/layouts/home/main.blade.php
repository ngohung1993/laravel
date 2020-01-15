<?php

use App\Helpers\FunctionHelpers;

isset(FunctionHelpers::get_custom_field_by_key('favicon')->value) ? $favicon = FunctionHelpers::get_custom_field_by_key('favicon')->value : '';
?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title_and_meta')
    <link rel="icon" href="{{isset($favicon)? $favicon : ''}}" type="image/x-icon">
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/theme-style.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/index-home.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/footer.css') }}" rel="stylesheet">
    @stack('price')
    @stack('style-news-page')
    @stack('product-page')
    @stack('contact-page.css')
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

    </style>
</head>
<body>
<div id="container">
    @include('layouts.home.header')

    @yield('content')

    @include('layouts.home.footer')

</div>

<script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('home/js/default.min.js') }}"></script>
<script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var owl = $('#owl-carousel-partner');
        owl.owlCarousel({
            items: 5,
            loop: true,
            autoplay: true,
            margin: 10,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            dots: false
        });
    })
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=244123292934494&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>
@stack('price-js')
@stack('product-page.js')
</body>
</html>

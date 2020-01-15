<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Theme Demo') }}</title>
    <link href="{{ asset('home/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/pro-folio.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/Reset.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/Contact.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/demo.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrap-iframe">
    @yield('content')
</div>
<script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home/js/setting.js') }}"></script>
<script src="{{ asset('home/js/toastr.js') }}"></script>
@stack('theme-demo-page.js')
<script>
    $("document").ready(function () {
        $(".close-demo-top").click(function () {
            $(".demo-top").remove();
        });
        $(".device-action-item").click(function () {
            var par = $(this).attr("data-id");
            $(".device-action-item").removeClass("active");
            $(this).addClass("active");

            var wrap_frame = $(".wrap-iframe");

            wrap_frame.removeClass("mobile");
            wrap_frame.addClass(par);
        });
    });
</script>
</body>
</html>

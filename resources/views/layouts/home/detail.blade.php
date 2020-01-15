<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('home/css/detail.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/pro-folio.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/footer.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper" class="default-wrapper">
    @include('layouts.home.header')

    @yield('content')

    @include('layouts.home.footer')

</div>

<script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('home/js/back-to-top.js') }}"></script>
<script src="{{ asset('home/js/setting.js') }}"></script>
<script src="{{ asset('home/js/toastr.js') }}"></script>
<script src="{{ asset('home/js/menu.js') }}"></script>
@stack('style')
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=244123292934494&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>

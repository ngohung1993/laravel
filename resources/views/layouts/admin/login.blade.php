<?php

use App\Helpers\FunctionHelpers;
use Illuminate\Support\Facades\DB;

?>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/core.css') }}" rel="stylesheet">
</head>
<body class="login pace-done" style="min-height: auto;">

@yield('content')

</body>
</html>

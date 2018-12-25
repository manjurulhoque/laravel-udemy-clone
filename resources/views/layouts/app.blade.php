<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Udemy Clone</title>

    @include('partials.header')
</head>
<body class="gray-bg">
    @include('partials.navbar')
    @yield('content')
    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>

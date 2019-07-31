<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('libs/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/base/vendor.bundle.base.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/stylemajestic.css') }}">
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="{{ asset('libs/base/vendor.bundle.base.js') }}"></script>
    @stack('styles')
    @stack('top_scripts')
</head>
<body>
@yield('content')
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
@stack('bottom_scripts')
</body>
</html>
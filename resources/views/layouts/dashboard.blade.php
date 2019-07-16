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
    <link rel="stylesheet" href="{{ asset('libs/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylemajestic.css') }}">
    <link rel="shortcut icon" href="images/favicon.png" />
    @stack('styles')
    @stack('top_scripts')
</head>
<body>
@yield('content')
@stack('bottom_scripts')
</body>
</html>
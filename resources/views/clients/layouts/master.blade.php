<!DOCTYPE html>


<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Home')</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}">
    @include('clients.layouts.partials.css')

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>

<body>
    <!-- navigation -->
    <header class="navigation fixed-top">
        @include('clients.layouts.partials.header')
    </header>
    <!-- /navigation -->

    <!-- start of banner -->
    @yield('breadcump')
    <!-- end of banner -->
    @yield('content')

    <footer class="footer">
        @include('clients.layouts.partials.footer')
    </footer>


    <!-- JS Plugins -->
    @include('clients.layouts.partials.js')

</body>

</html>

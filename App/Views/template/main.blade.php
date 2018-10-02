<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/main.css">
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <meta name="description" content="{{container()->Configuration::$configuration->seo}}">
        @yield('head')
    </head>
    <body>
        @include('include/header')
        @yield('body')
    </body>
</html>

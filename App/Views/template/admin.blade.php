<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/admin.css">
        @yield('head')
    </head>
    <body>
        <div class="menu">
            @include('include/admin-sidebar')
        </div>
        <div class="content">
            @yield('body')
        </div>
    </body>
</html>

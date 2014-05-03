<!DOCTYPE html>
<html>
    <head>
        <title>@yield('head.title') | Lavender eCommerce</title>
    </head>
    <body>
        <div class="header" style="padding:10px 0;">
            @yield('header')
        </div>
        <div class="content" style="padding:50px 0;">
            @yield('content')
        </div>
        <div class="footer" style="padding:10px 0;">
            @yield('footer')
        </div>
    </body>
</html>
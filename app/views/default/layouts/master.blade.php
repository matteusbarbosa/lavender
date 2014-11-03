<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('head.title') |
        @yield('head.anchor')
    </title>
    <meta name="robots" content="noindex, nofollow">
    @yield('styles')
</head>
<body>
<div class="header clearfix">
    <div class="container">
        @yield('header.top')
        @yield('header')
        @yield('header.bottom')
    </div>
</div>
<div class="content clearfix">
    <div class="container">
        @yield('content.top')
        @yield('messages')
        @yield('content')
        @yield('content.bottom')
    </div>
</div>
<div class="footer clearfix">
    <div class="container">
        @yield('footer.top')
        @yield('footer')
        @yield('footer.bottom')
    </div>
</div>
</body>
</html>
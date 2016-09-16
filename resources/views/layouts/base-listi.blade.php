<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<!--<div class="container"> -->

    <header class="row">
        @include('includes.listi-header')
    </header>

    <div id="main" class="row">
        @yield('content')
    </div>

    <footer class="footer">
        @include('includes.footer')
    </footer>


</body>
</html>
<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<!--<div class="container"> -->
 <div class="container">
    <header class="row">
        @include('includes.admin-header')
    </header>
   
        <div id="main" class="row">
            @yield('content')
        </div>
    
    <footer class="footer">
        @include('includes.footer')
    </footer>
    </div>
<!--</div>-->
</body>
</html>
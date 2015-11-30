<!doctype html>
<html>
    <head>
        <title>Formations - @yield('title')</title>
        <script src="@yield('js-file')"></script>
        <link rel="stylesheet" href="@yield('css-file')" type="text/css" />

    </head>
    <body ng-app="parametresApp">
        <div id="main">
            @include('components.header')
            @include('components.menu')
            <div id="content" class="main-block">
                @yield('content')
            </div>

            @include ('components.footer')
        </div>
    </body>
</html>

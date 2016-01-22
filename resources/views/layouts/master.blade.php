<!doctype html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Formations - @yield('title')</title>
        <script type="text/javascript" src="@yield('js-file')"></script>
<!--
        <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
-->
        <link rel="stylesheet" href="@yield('css-file')" type="text/css" />

    </head>
    <body ng-app="@yield('angularApp')">
        <div id="main" class="container">
            @include('components.header')
            @include('components.menu', ['current_menu' => $current_menu])
            <div id="content" class="main-block">
                @yield('content')
            </div>

            @include ('components.footer')
        </div>
    </body>
</html>

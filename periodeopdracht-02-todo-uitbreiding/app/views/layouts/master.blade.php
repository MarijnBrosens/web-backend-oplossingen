<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>lalalal</title>
        {{ HTML::style('css/style.css') }}
    </head>
    <body>

    	@include('layouts.nav')
        @yield('content')
    </body>
</html>
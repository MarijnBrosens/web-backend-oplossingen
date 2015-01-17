<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Periodeopdracht-02-todo-uitbreiding</title>
        {{ HTML::style('http://fonts.googleapis.com/css?family=Roboto') }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans' ) }}
        {{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css') }}
        {{ HTML::style('css/style.css') }}
    </head>
    <body>
    	<nav>
    	    @include('layouts.nav')
    	</nav>  

    	<div class="container">  	

    		@yield('content')

    	</div>        
    </body>
</html>
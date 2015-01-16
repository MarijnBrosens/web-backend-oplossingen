<?php

class TodoController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getTodos()
	{
		// todos van een bepaalde user
		$todos = Auth::user()->todos;

		// compact -> geeft todos mee
		return View::make( 'todos.index' , compact( 'todos' ) );
	}

}
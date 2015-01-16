<?php

class LoginController extends BaseController {

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

	public function getLogin()
	{
		return View::make( 'login.index' );
	}

	public function postLogin()
	{

		$loginData = array( 'email' => 'require' , 'password' => 'require');
		$validator = Validator::make( Input::all() , $loginData );

		if ( $validator->fails() ) {
			Session::push('errorMesage', 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw');
		}

		return View::make( 'login.index' );
	}

}

<?php

class UserController extends BaseController {

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
		/*
		$input = Input::all();

		// data van de inputs
		$loginData = array( 'email' => 'required' , 'password' => 'required');

		// check of gebruikersnaam, password zijn ingevuld
		$validator = Validator::make( $input , $loginData );

		// error message bij validatie inputs
		if ( $validator->fails() ) 
		{
			// moet allias zijn, niet login.index ( in router gedefinieerd )
			return Redirect::route( 'login' ) 
				->withErrors( 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw' );
		}*/

		$emailPasswordArray = 	array(				
									'email' 	=> Input::get( 'email' ),
									'password' 	=> Input::get( 'password' ) 
								);

		// auth kijkt tabel na 
		$auth = Auth::attempt( $emailPasswordArray , false );

		if ( !$auth ) {
			return Redirect::route('login')
				->withErrors( 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw' );
		}

		// moet allias zijn
		return Redirect::route( 'dashboard' );	

	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('login')
			->withErrors( 'Je bent succesvol uitgelogd' );
	}

}

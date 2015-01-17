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

		$emailPasswordArray = 	array(				
									'email' 	=> Input::get( 'email' ),
									'password' 	=> Input::get( 'password' ) 
								);

		// auth kijkt user na 
		$auth = Auth::attempt( $emailPasswordArray , false );

		if ( !$auth ) {
			return Redirect::route('login')
				->withErrors( 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw' );
		}

		// moet allias zijn
		return Redirect::route( 'dashboard' );	
	}

	public function getRegistrer()
	{
		return View::make( 'login.registrer' );
	}

	public function postRegistrer()
	{
		$input 			= Input::all();
		$registrerFields= array( 'email' => 'required', 'password' => 'required');
		$validator 		= Validator::make( $input , $registrerFields );
		$email 			= Input::get( 'email' );
		$password	 	= Input::get( 'password' );

		// usercheck
		$rules = array('email' => 'unique:users,email');

		$validator = Validator::make($input, $rules);

		if ($validator->fails()) 
		{
		    return Redirect::route( 'registrer' ) 
						->withErrors( 'Oeps, Er bestaat al een gebruiker met dit emailadres!' );
		} 
		else 
		{
			$hashedPassword = Hash::make( $password );
			DB::table( 'users' )->insert(
			    array(	'email' 	=> $email,
			    		'password' 	=> $hashedPassword )
			);

			return Redirect::route( 'login' );
		}


		
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('login')
			->withErrors( 'Je bent succesvol uitgelogd' );
	}

}

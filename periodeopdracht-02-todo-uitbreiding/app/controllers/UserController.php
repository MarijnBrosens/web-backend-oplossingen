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
		$email 			= Input::get( 'email' );
		$password	 	= Input::get( 'password' );
		$registrerFields= array( 'email' => 'required|min:3', 'password' => 'required|min:8');
		$validator 		= Validator::make( $input , $registrerFields );

		// usercheck
		$rules = array('email' => 'unique:users,email');

		$userExistsValidator = Validator::make($input, $rules);

		if ($userExistsValidator->fails()) 
		{
		    return Redirect::route( 'registrer' ) 
						->withErrors( 'Oeps, Er bestaat al een gebruiker met dit emailadres!' );
		} 
		else 
		{
			if ($validator->fails()) {
				// unieke gebruiker, maar fout bij passwoord of email
				return Redirect::route( 'registrer' ) 
						->withErrors( $validator );
				
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
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('login')
			->withErrors( 'Je bent succesvol uitgelogd' );
	}

}

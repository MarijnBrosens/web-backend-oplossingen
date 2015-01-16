<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array( 'as' => 'home' , 'uses' => 'HomeController@getHome'));

//2015-01-14 00:00:00

// Route::get('/', function()
// {
// 	//$title = 'titel van de pagina';
// 	return View::make( 'home.index' );
// });

// Route::get('/about', function()
// {
// 	$title = 'about';
// 	return View::make( 'home.about' )->with('title', $title);
// });

// Route::post('/', function()
// {
// 	$input = Input::all();

// 	DB::insert('insert into users ( email, salt ) values ( ?,? )' , 
// 		array( $input['email'], $input['salt'] ));
// });

// Route::get('/', function()
// {
// 	//$user = DB::select('select * from users');

// 	//dd($user);
// 	//var_dump($user);

// 	//return $user;	
// });
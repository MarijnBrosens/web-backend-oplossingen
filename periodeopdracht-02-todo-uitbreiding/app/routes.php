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

//dashboard
Route::get('/', array( 'as' => 'dashboard' , 'uses' => 'DashboardController@getDashboard'))->before('auth'); // moet ingelogd zijn

//login
Route::get('/login', array( 'as' => 'login' , 'uses' => 'UserController@getLogin'))->before('guest'); //indien ingelogd redirect naar dashboard

Route::post('login', array( 'uses' => 'UserController@postLogin'))->before('csrf');

Route::get('/logout', array( 'as' => 'logout' , 'uses' => 'UserController@getLogout'));

//todos
Route::get('/todos', array( 'as' => 'todos' , 'uses' => 'TodoController@getTodos'))->before('auth'); // moet ingelogd zijn
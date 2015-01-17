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
		// todos van een bepaalde user die niet gedaan zijn en niet gearchiveerd zijn
		$todos = Auth::user()->todos()->where('isDone', '=', 0)->where('isArchived', '=', 0)->get();
		return View::make( 'todos.index' , compact( 'todos' ) );
	}

	public function getDones()
	{
		// todos van een bepaalde user die niet gedaan zijn en niet gearchiveerd zijn
		$dones = Auth::user()->todos()->where('isDone', '=', 1)->where('isArchived', '=', 0)->get();
		return View::make( 'dones.index' , compact( 'dones' ) );
	}

	public function getAdd()
	{
		return View::make( 'todos.add' );
	}

	public function postAdd()
	{

		$input 			= Input::all();
		$addTodoFields 	= array( 'todoTitle' => 'required', 'todoDetails' => 'required');
		$validator 		= Validator::make( $input , $addTodoFields );
		$userId 		= Auth::user()->id;
		$todoTitle 		= Input::get( 'todoTitle' );
		$todoDetails 	= Input::get( 'todoDetails' );

		if ( $validator->fails() ) 
		{
			return Redirect::route( 'addTodo' ) 
				->withErrors( 'Oeps, de velden die je hebt ingebuld zijn niet correct!' );
		}

		DB::table( 'todos' )->insert(
		    array(	'todoTitle' 	=> $todoTitle,
		    		'todoDetails' 	=> $todoDetails,
		    		'userId'		=> $userId )
		);

		return Redirect::route( 'dashboard' );
	}

	public function edit( $id )
    {
	
        if( $id->isDone == '0' )
        {
            $id->isDone = '1';
            $id->save();
        }
        else
        {
            $id->isDone = '0';
            $id->save();
        }

        return Redirect::route( 'dashboard' );
    }

	public function delete( $id )
    {
	
        /*if( $id->isArchived == '0' )
        {
            $id->isArchived = '1';
            $id->save();
        }
        else
        {*/
            $id->isArchived = '0';
            $id->save();
        //}

        return Redirect::route( 'dashboard' );
    }


}
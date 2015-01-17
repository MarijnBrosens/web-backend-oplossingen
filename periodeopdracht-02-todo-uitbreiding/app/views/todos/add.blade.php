@extends('layouts.master')

@section('content')

	@foreach ( $errors->all() as $errorMessage)

		<div class="modal error"> {{ $errorMessage }} </div>

	@endforeach

	<h1>Add new todo</h1>

	{{ Form::open( array( 'autocomplete' => 'off' ) ) }}
	{{ Form::text( 'todoTitle' , '' , array( 'placeholder' => 'Title' ) ) }}
	{{ Form::textarea('todoDetails', null , array('size' => '30x5', 'placeholder' => 'Details' ) ) }}
	{{ Form::submit( 'Add new' , array( 'class' => 'btn' ) ) }}

	{{ Form::close() }}

@stop
@extends('layouts.master')

@section('content')

	<h1>Registreren</h1>

	@foreach ( $errors->all() as $errorMessage)

		<div class="modal error"> {{ $errorMessage }} </div>

	@endforeach

	{{ Form::open( array( 'autocomplete' => 'off' ) ) }}
	{{ Form::text( 'email' , '' , array( 'placeholder' => 'email' ) ) }}
	{{ Form::password( 'password' , '' , array( 'placeholder' => 'password' ) ) }}
	{{ Form::submit( 'Registrer' , array( 'class' => 'btn' ) ) }}
	{{ Form::close() }}

	<p>
		<a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a>
	</p>

@stop
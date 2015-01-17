@extends('layouts.master')

@section('content')

	@foreach ( $errors->all() as $errorMessage)

		<div class="modal error"> {{ $errorMessage }} </div>

	@endforeach

	<h1>Registreren</h1>
	<p>login: testATtest.be // pass: test</p>

	{{ Form::open( array( 'autocomplete' => 'off' ) ) }}
	{{ Form::text( 'email' , '' , array( 'placeholder' => 'email' ) ) }}
	{{ Form::password( 'password' , '' , array( 'placeholder' => 'password' ) ) }}
	{{ Form::submit( 'Registrer' , array( 'class' => 'btn' ) ) }}
	{{ Form::close() }}

@stop
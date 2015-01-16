@extends('layouts.master')

@section('content')

	{{ Form::open( array( 'autocomplete' => 'off' ) ) }}

	{{ Form::text( 'email' , '' , array( 'placeholder' => 'email' ) ) }}
	{{ Form::password( 'password' , '' , array( 'placeholder' => 'password' ) ) }}
	{{ Form::submit( 'Login' , array( 'class' => 'btn' ) ) }}

	{{ Form::close() }}

@stop
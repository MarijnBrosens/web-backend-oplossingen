@extends('layouts.master')

@section('content')

	<h1>testje van template</h1>

	{{ Form::open( array('url' => '/' ) ) }}
	{{ Form::text( 'email' , '' , array( 'placeholder' => 'email' ) ) }}
	{{ Form::text( 'salt' , '' , array( 'placeholder' => 'salt' ) ) }}
	{{ Form::submit( 'Add name' , array( 'class' => 'btn btn-succes' ) ) }}
	{{ Form::close() }}

@stop
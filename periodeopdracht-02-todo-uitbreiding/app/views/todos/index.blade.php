@extends('layouts.master')

@section('content')

	<h1>Todo</h1>
	<p>
		<a href="{{ url('add') }}"><i class="fa fa-plus"></i> Add new todo</a>
	</p>

	<ul class="todos">

		@if( !$todos->isEmpty() )		

			@foreach ( $todos as $todo )

					<li>

						<h2>{{ $todo->todoTitle }}</h2>
						<p>{{ $todo->todoDetails }}</p>
						<a href="{{ URL::route( 'edit', $todo->id ) }}"><i class="edit fa fa-chevron-down"></i></a> --- 
						<a href="{{ URL::route( 'delete', $todo->id ) }}"><i class="fa fa-trash"></i></a>

					</li>

			@endforeach

		@else

			<h3>Er zijn geen todo's</h3>

		@endif

	</ul>

@stop
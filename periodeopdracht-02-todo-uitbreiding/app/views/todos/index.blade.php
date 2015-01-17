@extends('layouts.master')

@section('content')

	<h1>Todo's</h1>
	<p>
		<a href="{{ url('add') }}"><i class="fa fa-plus"></i> Add new todo</a>
	</p>

	<ul class="todos">

		@if( $todos )		

			@foreach ( $todos as $todo )

					<li>

						<h2>{{ $todo->todoTitle }}</h2>
						<p>{{ $todo->todoDetails }}</p>
						<a href="{{ URL::route( 'edit', $todo->id ) }}"><i class="fa fa-chevron-down"></i></a>
						<a href="{{ URL::route( 'delete', $todo->id ) }}"><i class="fa fa-trash"></i></a>

					</li>

			@endforeach

		@else

			<p>Er zijn geen todo's</p>

		@endif

	</ul>

@stop
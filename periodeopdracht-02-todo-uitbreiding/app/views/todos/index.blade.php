@extends('layouts.master')

@section('content')

	<h1>Todo's</h1>
	<p>
		<a href="{{ url('addTodo') }}"><i class="fa fa-plus"></i> Add new todo</a>
	</p>

	<ul class="todos">

		@if( $todos )		

			@foreach ( $todos as $todo )

					<li>

						{{ $todo->todoTitle }}
						{{ $todo->todoDetails }}
						<a href="{{ url('/done') }}"><i class="fa fa-chevron-down"></i></a>
						<a href="{{ url('/archive') }}"><i class="fa fa-trash"></i></a>

					</li>

			@endforeach

		@else

			<p>Er zijn geen todo's</p>


		@endif

	</ul>

@stop
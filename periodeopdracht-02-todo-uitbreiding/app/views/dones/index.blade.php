@extends('layouts.master')

@section('content')

	<h1>Done's</h1>
	<p>
		<a href="{{ url('add') }}"><i class="fa fa-plus"></i> Add new todo</a>
	</p>

	<ul class="todos">

		@if( $dones )		

			@foreach ( $dones as $done )

					<li>

						{{ $done->todoTitle }}
						{{ $done->todoDetails }}
						<a href="{{ URL::route( 'edit', $done->id ) }}"><i class="fa fa-chevron-down"></i></a>
						<a href="{{ URL::route( 'delete', $done->id ) }}"><i class="fa fa-trash"></i></a>

					</li>

			@endforeach

		@else

			<p>Je hebt nog niets gedaan!</p>

		@endif

	</ul>

@stop
@extends('layouts.master')

@section('content')

	<h1>Dashboard</h1>

	<ul class="dashboard">
		<li><a href="{{ url('add') }}"><i class="fa fa-plus"></i> Add</a></li> 
	    <li><a href="{{ url('todos') }}"><i class="fa fa-list"></i> Todo</a></li>	    
	    <li><a href="{{ url('dones') }}"><i class="fa fa-chevron-down"></i> Done</a></li>
	    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
	</ul>
	
@stop
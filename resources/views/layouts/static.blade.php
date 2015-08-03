@extends('layouts.core')
@section('content')
	<div class="boxx s-body">
		<div class="b-untouchable s-title">
			@yield('name')
		</div>
		<div class="s-container">
			@yield('Scontent')
		</div>
	</div>
@stop
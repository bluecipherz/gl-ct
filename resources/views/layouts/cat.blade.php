@extends('layouts.core')
@section('content')
	<div class="boxx cat-body">
		<div class="b-untouchable cat-title">
			@yield('name')
		</div>
		<div class="cat-container">
			@yield('Scontent')
		</div>
	</div>
@stop
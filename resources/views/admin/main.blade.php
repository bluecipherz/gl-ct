@extends('layouts.admin')

@section('content')
<div class="adm-container">
	<div class="row">
		@if(isset($message))
		<div class="col-lg-12 col-md-12">
			<div class="alert alert-danger">{{ $message }}<span class="close"></span></div>
		</div>
		@endif
		<div class="adm-sidebar">
			<ul class="list-group cust-list-group">
				@foreach($pages as $page => $pageDetails)
				<li class="list-group-item"><a href="{{ $pageDetails['link'] }}">{{ $page }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="adm-sidebar-r">
		
		</div>
		<div class="adm-cont" >
			@include('admin/partials/' . $currentPage)
			@section('path', '' . $currentPage )
		</div>
		
	</div>
</div>

@stop
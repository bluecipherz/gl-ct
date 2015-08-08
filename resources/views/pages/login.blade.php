@extends('layouts.core')

@section('content')

<div class="pageType" page="login" ></div>

<div class="boxx bg-white bg-h-100">
    @forelse($errors->all() as $error)
        <div class="alert alert-danger"><span class="close">&times;</span>{{ $error }}</div>
    @empty
    @endforelse
		<div class="login-box col-md-4 col-md-offset-4">
			@include('partials.login-register')
		</div>
</div>

@stop
@extends('layouts.freeframe')

@section('content')
<div class="adm-pag-bg">
	<div class="adm-bg-img-1">
		<img src="{{asset('img/admin/adm-bg1.jpg')}}">
	</div>
</div>

<div class="adm-login-box" >
    {!! Form::open(['action' => 'AuthController@loginAdmin', 'method' => 'POST']) !!}
	<input type="text" placeholder="Your Username" name="username"/>
	<input type="password" placeholder="Your Password" name="password"/>
	<button type="submit">Login</button>
    {!! Form::close() !!}
	<div id="adm-login-emsg">
        @forelse($errors->all() as $error)
            {{ $error }}
        @empty
		Have a nice day Admin.! Hope you are happy with <span>Bluroe</span>
        @endforelse
	</div>
</div>
@stop
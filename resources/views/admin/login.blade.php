@extends('layouts.freeframe')

@section('content')
<div class="adm-pag-bg">
	<div class="adm-bg-img-1">
		<img src="{{asset('img/admin/adm-bg1.jpg')}}">
	</div>
</div>

<div class="adm-login-box" >
	<input type="text" placeholder="Your Username"/>
	<input type="password" placeholder="Your Password"/>
	<button type="submit">Login</button>
	<div id="adm-login-emsg">
		Have a nice day Admin.! Hope you are happy with <span>Bluroe</span>
	</div>
</div>
@stop
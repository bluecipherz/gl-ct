@extends('layouts.core')

@section('content')

<div class="pageType" page="login" ></div>

<div class="boxx bg-white bg-h-100">
		<div class="login-box col-md-4 col-md-offset-4">
			<div class="loginMB">
				<h2>Login</h2>
				<div class="logoBarOuter">GLOBEX<span>CART</span></div>
				<div class="form-group"><input type="text" placeholder="Your Email" class="glob-control"/></div>
				<div class="form-group"><input type="text" placeholder="Your Password" class="glob-control"/></div>
				<div class="form-group"><button class="glob-control">Login</button></div>
				<div class="form-group">Don't have an account ? <span class="b-fakeLink-text loginMBLbtn">Register Now</span></div>
			</div>
			<div class="regMB">
				<div class="logoBarOuter"><h2>Register with</h2> GLOBEX<span>CART</span></div>
				<div class="form-group"><input type="text" placeholder="Your Email" class="glob-control"/></div>
				<div class="form-group"><input type="text" placeholder="Your Password" class="glob-control"/></div>
				<div class="form-group"><input type="text" placeholder="Confirm Password" class="glob-control"/></div>
				<div class="form-group"><button class="glob-control">Register</button></div>
				<div class="form-group">Already have an account ? <span class="b-fakeLink-text regMBLbtn">Login</span></div>
			</div>
		</div>
</div>

@stop
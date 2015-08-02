<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>GlobexCart - @yield('title') </title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/BCZ-Boxes.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin-panel.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/Boxes-updated.css') }}" rel="stylesheet">
	
	<script>
        @if(Auth::check())
            {{ 'var login = true;' }}
        @else
            {{ 'var login = false;' }}
        @endif
	</script>

	<!-- Fonts 
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	
	<nav class="mainNav ">
		<div class="NavTop" >
			<div class="boxx" >
					
			</div>
		</div>
		<div class="NavBottom" >
			<div class="boxx" >
				<div class="logoBarOuter b-untouchable">
					<a href="{{ url('/home') }}">GLOBEX<span>CART</span></a>
				</div>
				<div class="searchBarOuter" >
					<div class="serachBar" ><input type="text" id="search_q" class="serachField" placeholder="Search here"/><div class="serachBtn"> <span class="searchIcon"></span></div></div>
				</div>
				<div class="userBarOuter pull-right b-untouchable">
					<a class="userBtn"  href="help">
						<img src="{{ asset('img/nav/help.png') }}">
						<div>Help</div>
					</a>
					<div class="userBtn acctBtn">
						<img src="{{ asset('img/nav/account.png') }}">
						<div>Account</div>
					</div>
					<div class="userBtn">
						<img src="{{ asset('img/nav/more.png') }}">
						<div>Contact Us</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="mainNav-f ">
	</div>
	<div class="overlay col-md-12 mainReg">
		<div class="overlay-backbtn"></div>
		<div class="login-box login-box-main col-md-4 col-md-offset-4">
			@if(Auth::user())
				@include('/auth/partials/logged')
			@else
			<div class="loginMB">
				<h2>Login</h2>
				<div class="logoBarOuter">GLOBEX<span>CART</span></div>
				<div class="form-group"><input type="text" placeholder="Your Email" class="glob-control" id="auth-login-email"/></div>
				<div class="form-group"><input type="text" placeholder="Your Password" class="glob-control" id="auth-login-pass"/></div>
				<div class="form-group"><button class="glob-control" id="auth-login-btn">Login</button></div>
				<div class="form-group">Don't have an account ? <span class="b-fakeLink-text loginMBLbtn">Register Now</span></div>
			</div>
			<div class="regMB">
				<div class="logoBarOuter"><h2>Register with</h2> GLOBEX<span>CART</span></div>
				<div class="form-group"><input type="text" placeholder="Your Email" class="glob-control" id="auth-register-email" name="email"/></div>
				<div class="form-group"><input type="text" placeholder="Your Password" class="glob-control" id="auth-register-pass" name="password"/></div>
				<div class="form-group"><input type="text" placeholder="Confirm Password" class="glob-control" id="auth-register-pass-again" name="password_confirmation"/></div>
				<div class="form-group"><button class="glob-control" id="auth-register-btn">Register</button></div>
				<div class="form-group">Already have an account ? <span class="b-fakeLink-text regMBLbtn">Login</span></div>
			</div>
			@endif
		</div>
	</div>

	@yield('content')

	<!-- Scripts -->
	
	<footer>
		<div class="footerH">
			<div class="boxx">
				<div class="col-md-12">
					<div class="col-md-3 fbox">
						<span class="fbh">Support</span>
						<a class="fbd">Help</a>
						<a class="fbd">Contact us</a>
					</div>
					<div class="col-md-3 fbox">
						<span class="fbh">Get social</span>
						<a class="fbd">Facebook</a>
						<a class="fbd">Twitter</a>
						<a class="fbd">Instagram</a>
						<a class="fbd">Youtube</a>
					</div>
					<div class="col-md-3 fbox">
						<span class="fbh">UAE</span>
						<a class="fbd">Dubai</a>
						<a class="fbd">Abu Dhabi</a>
						<a class="fbd">Ras al Khaimah</a>
						<a class="fbd">Sharjah</a>
						<a class="fbd">Fujairah</a>
						<a class="fbd">Ajman</a>
						<a class="fbd">Umm al Quwain</a>
						<a class="fbd">Al Ain</a>
					</div>
					<div class="col-md-3 fbox">
						<span class="fbh">Company</span>
						<a class="fbd">About Us</a>
						<a class="fbd">Terms of Use</a>
						<a class="fbd">Privacy Policy</a>
					</div>
				</div>
			</div>
		</div>
		<div class="footerF">
			<div class="boxx">
				<span class="footerFIcon b-untouchable">GLOBEXCART</span>
			</div>
		</div>
	</footer>
	
	<script src="{{ asset('/js/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('/js/jquery.countdown.js') }}"></script>
	<script src="{{ asset('/js/BCZ-Boxes.min.js') }}"></script>
	<script src="{{ asset('/js/script.js') }}"></script>
	
</body>
</html>

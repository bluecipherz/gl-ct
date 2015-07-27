<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GlobexCart - @yield('title') </title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/BCZ-Boxes.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin-panel.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/Boxes-updated.css') }}" rel="stylesheet">

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
					GLOBEX<span>CART</span>
				</div>
				<div class="searchBarOuter" >
					<div class="serachBar" ><input type="text" id="search_q" class="serachField" placeholder="Search here"/><div class="serachBtn"> <span class="searchIcon"></span></div></div>
				</div>
				<div class="userBarOuter pull-right b-untouchable">
					<div class="userBtn">
						<img src="img/nav/help.png">
						<div>Help</div>
					</div>
					<div class="userBtn acctBtn">
						<img src="img/nav/account.png">
						<div>Account</div>
					</div>
					<div class="userBtn">
						<img src="img/nav/cart.png">
						<span class="cartCount">12</span>
						<div>Cart</div>
					</div>
					<div class="userBtn">
						<img src="img/nav/more.png">
						<div>More</div>
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

	@yield('content')

	<!-- Scripts -->
	
	<script src="{{ asset('/js/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('/js/jquery.countdown.js') }}"></script>
	<script src="{{ asset('/js/app.js') }}"></script>
	<script src="{{ asset('/js/BCZ-Boxes.min.js') }}"></script>
	<script src="{{ asset('/js/script.js') }}"></script>
	
</body>
</html>

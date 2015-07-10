<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GlobexCart - @yield('title') </title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/BCZ-Boxes.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
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
						<div class="serachBar" ><input type="text" class="serachField" placeholder="Search here"/><div class="serachBtn"> <span class="searchIcon"></span></div></div>
					</div>
					<div class="userBarOuter pull-right b-untouchable">
						<div class="userBtn">
							<img src="img/nav/help.png">
							<div>Help</div>
						</div>
						<div class="userBtn">
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

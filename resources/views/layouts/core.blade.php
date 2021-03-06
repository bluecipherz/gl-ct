<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>GlobexCart - @yield('title') </title>

	@include('layouts.csslinks')
	
	<script>
        @if(Auth::customer()->check())
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
		<div class="NavTop visible-xs" >
			<div class="boxx" >
                <div class="logoBarOuter b-untouchable">
                    <a href="{{ url('/home') }}"><span class="logoimg"> <img draggable="false"  src="{{ asset('img/logo/LOGO-60.png') }}"> </span></a>
                </div>
                <div class="userBarOuter pull-right b-untouchable">
                    <a class="userBtn userBtn-help"  href="{{ url('/help') }}">
                        <img src="{{ asset('img/nav/help.png') }}">
                        <div>Help</div>
                    </a>
                    <div class="userBtn acctBtn">
                        <img src="{{ asset('img/nav/account.png') }}">
                        <div>Account</div>
                    </div>
                    <a class="userBtn"  href="{{ route('advertisements.create') }}">
                        <img src="{{ asset('img/nav/more.png') }}">
                        <div>Post ad</div>
                    </a>
                </div>
			</div>
		</div>
		<div class="NavBottom " >
			<div class="boxx" >
				<div class="logoBarOuter b-untouchable hidden-xs">
					<a href="{{ url('/home') }}"><span class="logoimg"> <img draggable="false"  src="{{ asset('img/logo/LOGO-60.png') }}"> </span></a>
				</div>
				<div class="searchBarOuter " >
					<div class="searchBar" >
                        <input type="text" id="search_q" class="serachField" placeholder="Search here" list="searchList" value="{{ $searchQuery or '' }}"/>
                        <datalist id="searchList">
                            @foreach($products as $product)
                                <option>{{ $product->title }}</option>
                            @endforeach
                        </datalist>
                        <div class="serachBtn" id="serachBtn"> <span class="searchIcon2"></span></div>
                    </div>
				</div>
				<div class="userBarOuter pull-right b-untouchable hidden-xs">
					<a class="userBtn"  href="{{ url('/help') }}">
						<img src="{{ asset('img/nav/help.png') }}">
						<div>Help</div>
					</a>
					<div class="userBtn acctBtn">
						<img src="{{ asset('img/nav/account.png') }}">
						<div>Account</div>
					</div>
					<a class="userBtn"  href="{{ route('advertisements.create') }}">
						<img src="{{ asset('img/nav/more.png') }}">
						<div>Post ad</div>
					</a>
				</div>

                <div class="hmdd-btn  visible-xs ">
                    <div class="mor-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

			</div>
		</div>
	</nav>

	<div class="mainNav-f ">
	</div>

    <div class="visible-xs ">
        <div class="nav-dropCont">
            @foreach($categories as $cat)
                <a href="{{ route('categories.show', $cat) }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>

	<div class="overlay col-md-12 mainReg">
		<div class="overlay-backbtn"></div>
		<div class="login-box login-box-main col-md-4 col-md-offset-4">
            <div class=" acnt-r-closBtn "> X </div>
            @if(Auth::customer()->check())
            <div class="loggedMB">
                @include('/auth/partials/logged')
            </div>
            @else
            <div class="loggedMB" style="display:none;">
				
            </div>
            @endif
			<div class="loginMB">
				<h2>Login</h2>
				<div class="gl-contain-60-c"><span class="g-logo-contain gl-contain-60" ></span></div>
				
				<div class="form-group">
					<input type="text" placeholder="Your Email" class="glob-control " id="auth-login-email"/>
					<div class="pn-popup"></div>
				</div>
				<div class="form-group">
                    <input type="password" placeholder="Your Password" class="glob-control noFwdTab" id="auth-login-pass"/>
					<div class="pn-popup"></div>
				</div>
				
				<div class="lbox-errorM">Thanks for being a part of Globexkart</div>
				<div class="form-group"><button class="glob-control" id="auth-login-btn">Login</button></div>
				<div class="form-group">Don't have an account ? <span class="b-fakeLink-text loginMBLbtn">Register Now</span></div>
			</div>
			<div class="regMB">
				<h2 >Register with</h2>
				<div class="gl-contain-60-c"><span class="g-logo-contain gl-contain-60" ></span></div>
				<div class="form-group">
					<input type="email" placeholder="Your Email" class="glob-control noBwdTab" id="auth-register-email" name="email"/>
					<div class="pn-popup"></div>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Your Password" class="glob-control" id="auth-register-pass" name="password"/>
					<div class="pn-popup"></div>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Confirm Password" class="glob-control" id="auth-register-pass-again" name="password_confirmation"/>
					<div class="pn-popup"></div>
				</div>
				<div class="lbox-errorM">Thanks for being a part of Globexkart</div>
				<div class="form-group"><button class="glob-control" id="auth-register-btn">Register</button></div>
				<div class="form-group">Already have an account ? <span class="b-fakeLink-text regMBLbtn">Login</span></div>
			</div>
		</div>
	</div>
	<!-- Push notification [ Powered by BCZ Boxes ] -->
	
	<div class="message">
		<div class="boxx">
			<div class="mIcon">
				<div class="mSuccessIcon b-hide"></div>
				<div class="mFailIcon b-hide"></div>
				<div class="mInfoIcon b-hide"></div>
			</div>
			<div class="mCont">
				<span class="mc-head"></span>
				<span class="mc-mes"></span>
			</div>
			<div class="mAction"><div class="mCloseIcon-s"></div></div>
		</div>
	</div>

    <div class="float-postad">
        <div class="closBtn">X</div>
        <a href="{{ route('advertisements.create') }}">
           <div class="FloatText"> Post free Ad ! ! </div>
        </a>
    </div>
	@yield('content')

	<!-- Scripts -->
	
	<footer>
		<div class="footerH  ">
			<div class="boxx">
				<div class="col-md-12">
					<div class="col-md-3 fbox">
						<div><span class="fbh">Support</span></div>
						<div><a href="{{ url('/help') }}" class="fbd">Help</a></div>
						<div><a href="{{ url('/contact-us') }}" class="fbd">Contact us</a></div>
					</div>
					<div class="col-md-3 fbox">
						<div><span class="fbh">Get social</span></div>
						<div><a href="http://www.facebook.com" class="fbd">Facebook</a></div>
						<div><a href="http://www.twitter.com"  class="fbd">Twitter</a></div>
						<div><a href="http://www.instagram.com"  class="fbd">Instagram</a></div>
					</div>
                    <div class="col-md-3 fbox">
                        <div><span class="fbh">UAE</span></div>
                        @foreach($emirates as $emirate)
						    <div><a class="fbd" href="{{ url('ads/' . $emirate->slug) }}">{{ $emirate->name }}</a></div>
						@endforeach
					</div>
					<div class="col-md-3 fbox">
						<div><span class="fbh">Company</span></div>
						<div><a href="{{ url('/about-us') }}" class="fbd">About Us</a></div>
						<div><a href="{{ url('/terms-of-use') }}" class="fbd">Terms of Use</a></div>
						<div><a href="{{ url('/privacy-policy') }}" class="fbd">Privacy Policy</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="footerF">
			<div class="boxx">
				<span class="footerFIcon b-untouchable"> <img draggable="false" src="{{ asset('img/logo/LOGO-100-b.png') }}"></span>
				<span class=" b-untouchable"> GlobexKart 2015 </span>
			</div>
		</div>
	</footer>
	
	@include('layouts.jslinks')
	
</body>
</html>

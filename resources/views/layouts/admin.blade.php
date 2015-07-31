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
		<div class="adm-NavTop" >
		</div>
		<div class="adm-NavBottom" >
			<div class="input-group cust-input-group">
				<span class="input-group-btn">
					<button class="btn btn-default cust-adm-s-btn"><span class="glyphicon glyphicon-search"></span></button>
				</span>
				<input type="text" class="form-control cust-adm-search-f" placeholder="Search">
			</div>
			<div class="adm-path-panel">
				Admin Panel / {{ $pageTitle }}
			</div>
		</div>
	</nav>
	<div class="mainNav-f ">
	</div>


    <div class="adm-container">
        <div class="row">
            @if(isset($message))
                <div class="col-lg-12 col-md-12">
                    <div class="alert alert-danger">{{ $message }}<span class="close"></span></div>
                </div>
            @endif
            @include('admin.sidebar')
            <div class="adm-sidebar-r">

            </div>
            <div class="adm-cont" >
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Scripts -->
	
	<script src="{{ asset('/js/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('/js/jquery.countdown.js') }}"></script>
	<script src="{{ asset('/js/BCZ-Boxes.min.js') }}"></script>
	<script src="{{ asset('/js/script.js') }}"></script>
	
</body>
</html>

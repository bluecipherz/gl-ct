<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>GlobexCart - {{ $pageTitle }} </title>

	@include('layouts.csslinks')
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
            @include('admin.sidebar')
            <div class="adm-sidebar-r">

            </div>
            <div class="adm-cont" >
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Scripts -->

	{{--@include('layouts.jslinks')--}}
    {!! HTML::script('js/jquery-2.1.4.js') !!}
    {!! HTML::script('js/app.js') !!}
    {!! HTML::script('js/category.js') !!}
    {!! HTML::script('js/dashboard.js') !!}
    {!! HTML::script('js/systemFunction.js') !!}
    {!! HTML::script('js/homePageManager.js') !!}

</body>
</html>

<!DOCTYPE html>
<html lang="en" ng-app="app">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		<link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Laravel</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}">Home</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		<!-- @yield('content') -->
		<div ng-view></div>

		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-resource.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-messages.min.js"></script>
		<!-- Login -->
		<script src="{{ asset('app/bower/angular-cookies/angular-cookies.min.js') }}"></script>
		<script src="{{ asset('app/bower/query-string/query-string.js') }}"></script>
		<script src="{{ asset('app/bower/angular-oauth2/dist/angular-oauth2.min.js') }}"></script>
		
		<!-- App -->
		<script src="{{ asset('app/app.js') }}"></script>		
	
		<!-- Controllers -->
		<script src="{{ asset('app/controllers/login.js') }}"></script>
		<script src="{{ asset('app/controllers/home.js') }}"></script>
		<script src="{{ asset('app/controllers/post/postList.js') }}"></script>
		<script src="{{ asset('app/controllers/post/postNovo.js') }}"></script>
		<script src="{{ asset('app/controllers/post/postEditar.js') }}"></script>
		<script src="{{ asset('app/controllers/post/postRemover.js') }}"></script>
		
		<!-- Services -->
		<script src="{{ asset('app/services/post.js') }}"></script>

	</body>
</html>
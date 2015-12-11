<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="/vendor/comments/css/prism-okaidia.css"> <!-- Optional -->
	<link rel="stylesheet" href="/vendor/comments/css/comments.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/board') }}">Your Boards</a></li>
				</ul>
				<!-- Search form -->
				<form class="search-container" action="">
					<input id="search-box" placeholder="Enter a Board Pin" type="text" class="search-box" name="q" />
					<label for="search-box"><span class="glyphicon glyphicon-search search-icon"></span></label>
					<input type="submit" id="search-submit" />
				</form>
				<ul class="nav navbar-nav navbar-right">




					<li><a href="{{ url('/Build') }}">Build</a></li>
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="">Settings</a></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>

							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
<div class="container">


	@yield('content')
	</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/vendor/comments/js/prism.js"></script> <!-- Optional -->
	<!-- This must be included before the closing </body> tag! -->
	<script src="/vendor/comments/js/comments.js"></script>
	<script src="/vendor/js/bootbox.min.js"></script>
	<script src="/js/app.js"></script>
	<!-- Search form -->
	<script> document.addEventListener("touchstart", function(){}, true);</script>


</body>
</html>

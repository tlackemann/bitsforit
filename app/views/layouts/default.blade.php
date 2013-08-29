<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title> 
			@section('title') 
			@show 
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-responsive.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrapSwitch.css') }}" rel="stylesheet"><!-- Bootstrap switch from https://github.com/nostalgiaz/bootstrap-switch.git -->

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	
	</head>

	<body>
		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand active" href="{{ URL::to('/') }}">BitsForIt</a>
	        </div>
	        <div class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li {{ (Request::is('items*') ? 'class="active"' : '') }}><a href="{{ URL::to('/items') }}">Items</a></li>
	            @if (Sentry::check())
	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><a href="{{ URL::to('/my/offers') }}">Offers</a></li>
	                <li><a href="{{ URL::to('/my/items') }}">Items</a></li>
	                <li><a href="#">Settings</a></li>
	                <li class="divider"></li>
	                <!-- <li class="dropdown-header">Other</li>-->
	                <li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
	              </ul>
	            </li>
	            @else
	             <li {{ (Request::is('users/login') ? 'class="active"' : '') }}><a href="{{ URL::to('/users/login') }}">Sign In</a></li>
	             <li {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('/users/register') }}">Sign Up</a></li>
	            @endif
	          </ul>
	          <form class="navbar-form">
	            <div class="form-group">
	              <input type="text" placeholder="Search for something..." class="form-control">
	            </div>
	            <button type="submit" class="btn btn-success">Search</button>
	          </form>
	        </div><!--/.navbar-collapse -->
	      </div>
	    </div>
	    
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container" id="bits-page">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>

		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script> <!-- Thanks to Zizaco for this script:  http://zizaco.net  -->
		<script src="{{ asset('js/bootstrapSwitch.js') }}"></script> <!-- Bootstrap switch from https://github.com/nostalgiaz/bootstrap-switch.git -->

	</body>
</html>

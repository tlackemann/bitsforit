<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title> 
			@section('title') 
			@show 
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
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
	        </div>
	        <div class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	          	
	            @if (Sentry::check())
	            <li {{ (Request::is('my/dashboard') ? 'class="active"' : '') }}>
	            	<a href="{{ URL::to('/my/dashboard') }}">Dashboard</a>
	          	</li>
	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><a href="{{ URL::to('/my/dashboard') }}">Dashboard</a></li>
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
	        </div><!--/.navbar-collapse -->
	      </div>
	    </div>
	    
		<!-- ./ navbar -->
		    <!-- Main jumbotron for a primary marketing message or call to action -->
    	<div class="jumbotron">
	        <h1>BitsForIt</h1>
	        <p class="lead">Buy, sell, and trade with Bitcoin. Browse popular listings or post a request</p>
          	<div class="container">
	          <form class="">
	            <div class="form-group">
	              <input type="text" name="q" placeholder="Search for something..." class="form-control input-lg">
	            </div>

	            <button type="submit" class="btn btn-lg btn-success">Search</button>
	            <span class="bit-browse">or {{ link_to('categories', 'Browse by Category')}}</span>
	          </form>
	          </div>
      	</div>
		<!-- Container -->
		<div class="container">

			<div class="container">
      <!-- Example row of columns -->

	<?php
		$itemCategoriesClone = $itemCategories;
		$categoryCount = count($itemCategories);
		$i = 0;
		$j = 0;
	?>
      <div class="row">
        <div class="col-sm-4">
        	<h3>For Sale</h3>
        	<table class="table">
        		@foreach ($itemCategories as $category)
        			<?php if ($i%2 == 0) : ?><tr><?php endif; ?>
					<td class="">
						<a href="{{ URL::to("/categories/$category->slug") }}">{{ $category->name }}</a>
					</td>

        			<?php if ($i%2 != 0) : ?></tr><?php endif; $i++; ?>
				@endforeach
        	</table>
        	
		</div>
	<!-- 	<div class="col-sm-4">
        	<h3>Housing</h3>
        	<ul>
			</ul>
		</div> -->
		<div class="col-sm-8">
        	<h3>Services</h3>
        	<div class="well well-sm">
        	<table class="table">
        		@foreach ($jobCategories as $category)
        			<?php if ($j%2 == 0) : ?><tr><?php endif; ?>
					<td class="">
						<a href="{{ URL::to("/categories/$category->slug") }}">{{ $category->name }}</a>
					</td>

        			<?php if ($j%2 != 0) : ?></tr><?php endif; $j++; ?>
				@endforeach
        	</table>
        	</div>
		</div>
      </div>
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

	</body>
</html>

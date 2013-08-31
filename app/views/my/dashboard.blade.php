@extends('layouts.default')

@section('content')

<div class="page-header">
  <h1>Dashboard <small>tlackemann (3)</small></h1>
</div>
@if ($items->count())
	<div class="row">
	<div class="col-md-2">
		<ul>
			<li>
				<a href="#" class="glyphicon glyphicon-list"></a>
			</li>
			<li>
				<a href="#items" class="glyphicon glyphicon-comment"></a>
			</li>
			<li>
				<a href="#bids" class="glyphicon glyphicon-shopping-cart"></a>
			</li>
			<li>
				<a href="#favorites" class="glyphicon glyphicon-heart"></a>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
	@foreach($items as $item)

		<div class="media">
		  <a class="pull-left thumbnail" href="#">
		    <img class="media-object" src="http://placekitten.com/175/175" alt="...">
		  </a>
		  <div class="media-body">
		    <h4 class="media-heading">{{ $item->title }}</h4>
		    <h3>{{ $item->price }}</h3>
		  </div>
		</div>
	@endforeach
	</div>
@else
	There are no items
@endif

@stop
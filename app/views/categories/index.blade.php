@extends('layouts.default')

@section('content')

<h1>All Categories</h1>

<p>{{ link_to_route('categories.create', 'Add new category') }}</p>

	<div class="row">
        <div class="col-lg-4">
        	<h3>For Sale</h3>
        	<ul>
			@foreach ($itemCategories as $category)
				<li>
					{{{ $category->name }}}
				</li>
			@endforeach
			</ul>
		</div>
		<div class="col-lg-4">
        	<h3>Housing</h3>
        	<ul>
			</ul>
		</div>
		<div class="col-lg-4">
        	<h3>Jobs</h3>
        	<ul>
			@foreach ($jobCategories as $category)
				<li>
					{{{ $category->name }}}
				</li>
			@endforeach
			</ul>
		</div>
	</div>


@stop
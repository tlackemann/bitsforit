@extends('layouts.scaffold')

@section('main')

<h1>Create Offer</h1>

{{ Form::open(array('route' => 'offers.store')) }}
	<ul>

        <li>
            {{ Form::label('listing_id', 'Listing_id:') }}
            {{ Form::input('number', 'listing_id') }}
        </li>

        <li>
            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price') }}
        </li>

        <li>
            {{ Form::label('accepted', 'Accepted:') }}
            {{ Form::checkbox('accepted') }}
        </li>

        <li>
            {{ Form::label('message', 'Message:') }}
            {{ Form::textarea('message') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop



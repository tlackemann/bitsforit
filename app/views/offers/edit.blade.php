@extends('layouts.scaffold')

@section('main')

<h1>Edit Offer</h1>
{{ Form::model($offer, array('method' => 'PATCH', 'route' => array('offers.update', $offer->id))) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('offers.show', 'Cancel', $offer->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
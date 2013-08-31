@extends('layouts.scaffold')

@section('main')

<h1>Create Feedback</h1>

{{ Form::open(array('route' => 'feedback.store')) }}
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
            {{ Form::label('rating', 'Rating:') }}
            {{ Form::input('number', 'rating') }}
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



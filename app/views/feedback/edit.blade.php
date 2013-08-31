@extends('layouts.scaffold')

@section('main')

<h1>Edit Feedback</h1>
{{ Form::model($feedback, array('method' => 'PATCH', 'route' => array('feedback.update', $feedback->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('feedback.show', 'Cancel', $feedback->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
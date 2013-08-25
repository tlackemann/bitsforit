@extends('layouts.scaffold')

@section('main')

<h1>Create Motd</h1>

{{ Form::open(array('route' => 'motds.store')) }}
	<ul>
        <li>
            {{ Form::label('message', 'Message:') }}
            {{ Form::textarea('message') }}
        </li>

        <li>
            {{ Form::label('link', 'Link:') }}
            {{ Form::text('link') }}
        </li>

        <li>
            {{ Form::label('active', 'Active:') }}
            {{ Form::checkbox('active') }}
        </li>

        <li>
            {{ Form::label('publish_date', 'Publish_date:') }}
            {{ Form::text('publish_date') }}
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



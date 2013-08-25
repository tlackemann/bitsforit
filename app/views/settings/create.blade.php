@extends('layouts.scaffold')

@section('main')

<h1>Create Setting</h1>

{{ Form::open(array('route' => 'settings.store')) }}
	<ul>
        <li>
            {{ Form::label('code', 'Code:') }}
            {{ Form::text('code') }}
        </li>

        <li>
            {{ Form::label('value', 'Value:') }}
            {{ Form::text('value') }}
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



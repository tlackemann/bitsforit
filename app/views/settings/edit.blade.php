@extends('layouts.scaffold')

@section('main')

<h1>Edit Setting</h1>
{{ Form::model($setting, array('method' => 'PATCH', 'route' => array('settings.update', $setting->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('settings.show', 'Cancel', $setting->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
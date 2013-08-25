@extends('layouts.scaffold')

@section('main')

<h1>Edit Template</h1>
{{ Form::model($template, array('method' => 'PATCH', 'route' => array('templates.update', $template->id))) }}
	<ul>
        <li>
            {{ Form::label('code', 'Code:') }}
            {{ Form::text('code') }}
        </li>

        <li>
            {{ Form::label('value', 'Value:') }}
            {{ Form::textarea('value') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('templates.show', 'Cancel', $template->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
@extends('layouts.scaffold')

@section('main')

<h1>Edit Motd</h1>
{{ Form::model($motd, array('method' => 'PATCH', 'route' => array('motds.update', $motd->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('motds.show', 'Cancel', $motd->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
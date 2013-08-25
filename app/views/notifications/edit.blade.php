@extends('layouts.scaffold')

@section('main')

<h1>Edit Notification</h1>
{{ Form::model($notification, array('method' => 'PATCH', 'route' => array('notifications.update', $notification->id))) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('notification', 'Notification:') }}
            {{ Form::textarea('notification') }}
        </li>

        <li>
            {{ Form::label('dismissable', 'Dismissable:') }}
            {{ Form::checkbox('dismissable') }}
        </li>

        <li>
            {{ Form::label('dismissed', 'Dismissed:') }}
            {{ Form::checkbox('dismissed') }}
        </li>

        <li>
            {{ Form::label('severity', 'Severity:') }}
            {{ Form::input('number', 'severity') }}
        </li>

        <li>
            {{ Form::label('expire_at', 'Expire_at:') }}
            {{ Form::text('expire_at') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('notifications.show', 'Cancel', $notification->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
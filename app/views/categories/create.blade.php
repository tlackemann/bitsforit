@extends('layouts.scaffold')

@section('main')

<h1>Create Category</h1>

{{ Form::open(array('route' => 'categories.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug') }}
        </li>
        <li>
            {{ Form::label('parent_id', 'Parent_id:') }}
            {{ Form::input('number', 'parent_id') }}
        </li>

        <li>
            {{ Form::label('active', 'Active:') }}
            {{ Form::checkbox('active') }}
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



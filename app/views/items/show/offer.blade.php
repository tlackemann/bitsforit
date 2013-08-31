@extends('layouts.default')

@section('content')

<h1>Create Offer</h1>

<p>{{ link_to("items/$item->id", 'Return to item') }}</p>
{{ Form::open(array('route' => 'offers.store')) }}
	<ul>

        <li>
            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price') }}
        </li>
        <li>
            {{ Form::label('message', 'Message:') }}
            {{ Form::textarea('message') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
	{{ Form::hidden('item_id', $item->id) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
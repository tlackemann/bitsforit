@extends('layouts.scaffold')

@section('main')

<h1>Create Item</h1>

{{ Form::open(array('route' => 'items.store')) }}
	<ul>
        <li>
            {{ Form::label('item_id', 'Item_id:') }}
            {{ Form::input('number', 'item_id') }}
        </li>

        <li>
            {{ Form::label('created_at', 'Created_at:') }}
            {{ Form::text('created_at') }}
        </li>

        <li>
            {{ Form::label('updated_at', 'Updated_at:') }}
            {{ Form::text('updated_at') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body') }}
        </li>

        <li>
            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price') }}
        </li>

        <li>
            {{ Form::label('featured', 'Featured:') }}
            {{ Form::checkbox('featured') }}
        </li>

        <li>
            {{ Form::label('condition', 'Condition:') }}
            {{ Form::input('number', 'condition') }}
        </li>

        <li>
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location') }}
        </li>

        <li>
            {{ Form::label('shipping_details', 'Shipping_details:') }}
            {{ Form::textarea('shipping_details') }}
        </li>

        <li>
            {{ Form::label('bitcoin_address', 'Bitcoin_address:') }}
            {{ Form::text('bitcoin_address') }}
        </li>

        <li>
            {{ Form::label('type_id', 'Type_id:') }}
            {{ Form::input('number', 'type_id') }}
        </li>

        <li>
            {{ Form::label('category_id', 'Category_id:') }}
            {{ Form::input('number', 'category_id') }}
        </li>

        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::checkbox('published') }}
        </li>

        <li>
            {{ Form::label('published_at', 'Published_at:') }}
            {{ Form::text('published_at') }}
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



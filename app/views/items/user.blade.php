@extends('layouts.default')

@section('content')

<h1>My Items</h1>

<p>{{ link_to_route('items.create', 'Add new item') }}</p>

@if ($items->count())
@else
	There are no items
@endif

@stop
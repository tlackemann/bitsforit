@extends('layouts.default')

@section('content')

<h1>All Items</h1>

<p>{{ link_to_route('items.create', 'Add new item') }}</p>

@if ($items->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Item_id</th>
				<th>Created_at</th>
				<th>Updated_at</th>
				<th>Title</th>
				<th>Body</th>
				<th>Price</th>
				<th>Featured</th>
				<th>Condition</th>
				<th>Location</th>
				<th>Shipping_details</th>
				<th>Bitcoin_address</th>
				<th>Type_id</th>
				<th>Category_id</th>
				<th>Published</th>
				<th>Published_at</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($items as $item)
				<tr>
					<td>{{{ $item->item_id }}}</td>
					<td>{{{ $item->created_at }}}</td>
					<td>{{{ $item->updated_at }}}</td>
					<td>{{{ $item->title }}}</td>
					<td>{{{ $item->body }}}</td>
					<td>{{{ $item->price }}}</td>
					<td>{{{ $item->featured }}}</td>
					<td>{{{ $item->condition }}}</td>
					<td>{{{ $item->location }}}</td>
					<td>{{{ $item->shipping_details }}}</td>
					<td>{{{ $item->bitcoin_address }}}</td>
					<td>{{{ $item->type_id }}}</td>
					<td>{{{ $item->category_id }}}</td>
					<td>{{{ $item->published }}}</td>
					<td>{{{ $item->published_at }}}</td>
                    <td>{{ link_to_route('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('items.destroy', $item->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no items
@endif

@stop
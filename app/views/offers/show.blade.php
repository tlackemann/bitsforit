@extends('layouts.scaffold')

@section('main')

<h1>Show Offer</h1>

<p>{{ link_to_route('offers.index', 'Return to all offers') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_id</th>
				<th>Listing_id</th>
				<th>Price</th>
				<th>Accepted</th>
				<th>Message</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $offer->user_id }}}</td>
					<td>{{{ $offer->listing_id }}}</td>
					<td>{{{ $offer->price }}}</td>
					<td>{{{ $offer->accepted }}}</td>
					<td>{{{ $offer->message }}}</td>
                    <td>{{ link_to_route('offers.edit', 'Edit', array($offer->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('offers.destroy', $offer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
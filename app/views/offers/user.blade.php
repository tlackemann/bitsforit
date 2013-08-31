@extends('layouts.scaffold')

@section('main')

<h1>My Offers</h1>

<p>{{ link_to_route('offers.create', 'Add new offer') }}</p>

@if ($offers->count())
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
			@foreach ($offers as $offer)
				<tr>
					<td>{{{ $offer->user_id }}}</td>
					<td>{{{ $offer->item_id }}}</td>
					<td>{{{ $offer->price }}}</td>
					<td>{{{ $offer->accepted }}}</td>
					<td>{{{ $offer->message }}}</td>
					@if (!$offer->accepted)
                    <td>{{ link_to("offers/accept/$offer->item_id", 'Accept', array('class' => 'btn btn-info')) }}</td>
                    @else
                    <td>Accepted</td>
                    @endif

                    <td>
                        {{ Form::open(array('method' => 'Reject', 'route' => array('offers.destroy', $offer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no offers
@endif

@stop
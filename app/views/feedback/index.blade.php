@extends('layouts.scaffold')

@section('main')

<h1>All Feedbacks</h1>

<p>{{ link_to_route('feedback.create', 'Add new feedback') }}</p>

@if ($feedbacks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User_id</th>
				<th>Listing_id</th>
				<th>Rating</th>
				<th>Message</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($feedbacks as $feedback)
				<tr>
					<td>{{{ $feedback->user_id }}}</td>
					<td>{{{ $feedback->listing_id }}}</td>
					<td>{{{ $feedback->rating }}}</td>
					<td>{{{ $feedback->message }}}</td>
                    <td>{{ link_to_route('feedback.edit', 'Edit', array($feedback->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('feedback.destroy', $feedback->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no feedbacks
@endif

@stop
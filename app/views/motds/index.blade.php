@extends('layouts.scaffold')

@section('main')

<h1>All Motds</h1>

<p>{{ link_to_route('motds.create', 'Add new motd') }}</p>

@if ($motds->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Message</th>
				<th>Link</th>
				<th>Active</th>
				<th>Publish_date</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($motds as $motd)
				<tr>
					<td>{{{ $motd->message }}}</td>
					<td>{{{ $motd->link }}}</td>
					<td>{{{ $motd->active }}}</td>
					<td>{{{ $motd->publish_date }}}</td>
                    <td>{{ link_to_route('motds.edit', 'Edit', array($motd->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('motds.destroy', $motd->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no motds
@endif

@stop
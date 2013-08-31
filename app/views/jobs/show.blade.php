@extends('layouts.scaffold')

@section('main')

<h1>Show Job</h1>

<p>{{ link_to_route('jobs.index', 'Return to all jobs') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Body</th>
				<th>Location</th>
				<th>User_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $job->title }}}</td>
					<td>{{{ $job->body }}}</td>
					<td>{{{ $job->location }}}</td>
					<td>{{{ $job->user_id }}}</td>
                    <td>{{ link_to_route('jobs.edit', 'Edit', array($job->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('jobs.destroy', $job->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
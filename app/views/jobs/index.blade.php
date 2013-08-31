@extends('layouts.scaffold')

@section('main')

<h1>All Jobs</h1>

<p>{{ link_to_route('jobs.create', 'Add new job') }}</p>

@if ($jobs->count())
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
			@foreach ($jobs as $job)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no jobs
@endif

@stop
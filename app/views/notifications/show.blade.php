@extends('layouts.scaffold')

@section('main')

<h1>Show Notification</h1>

<p>{{ link_to_route('notifications.index', 'Return to all notifications') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_id</th>
				<th>Notification</th>
				<th>Dismissable</th>
				<th>Dismissed</th>
				<th>Severity</th>
				<th>Expire_at</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $notification->user_id }}}</td>
					<td>{{{ $notification->notification }}}</td>
					<td>{{{ $notification->dismissable }}}</td>
					<td>{{{ $notification->dismissed }}}</td>
					<td>{{{ $notification->severity }}}</td>
					<td>{{{ $notification->expire_at }}}</td>
                    <td>{{ link_to_route('notifications.edit', 'Edit', array($notification->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('notifications.destroy', $notification->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
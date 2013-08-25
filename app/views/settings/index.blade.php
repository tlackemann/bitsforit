@extends('layouts.scaffold')

@section('main')

<h1>All Settings</h1>

<p>{{ link_to_route('settings.create', 'Add new setting') }}</p>

@if ($settings->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Code</th>
				<th>Value</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($settings as $setting)
				<tr>
					<td>{{{ $setting->code }}}</td>
					<td>{{{ $setting->value }}}</td>
                    <td>{{ link_to_route('settings.edit', 'Edit', array($setting->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('settings.destroy', $setting->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no settings
@endif

@stop
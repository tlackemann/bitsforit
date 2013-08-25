@extends('layouts.scaffold')

@section('main')

<h1>All Templates</h1>

<p>{{ link_to_route('templates.create', 'Add new template') }}</p>

@if ($templates->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Code</th>
				<th>Value</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($templates as $template)
				<tr>
					<td>{{{ $template->code }}}</td>
					<td>{{{ $template->value }}}</td>
                    <td>{{ link_to_route('templates.edit', 'Edit', array($template->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('templates.destroy', $template->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no templates
@endif

@stop
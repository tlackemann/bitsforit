@extends('layouts.scaffold')

@section('main')

<h1>Show Category</h1>

<p>{{ link_to_route('categories.index', 'Return to all categories') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Slug</th>
				<th>Parent_id</th>
				<th>Active</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $category->name }}}</td>
					<td>{{{ $category->slug }}}</td>
					<td>{{{ $category->parent_id }}}</td>
					<td>{{{ $category->active }}}</td>
                    <td>{{ link_to_route('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('categories.destroy', $category->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
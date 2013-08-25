@extends('layouts.scaffold')

@section('main')

<h1>All Categories</h1>

<p>{{ link_to_route('categories.create', 'Add new category') }}</p>

@if ($categories->count())
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
			@foreach ($categories as $category)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no categories
@endif

@stop
<?php

use App\Author;
use App\Conference;

?>
@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="panel-body">
	@if (count($papers) > 0)
	<table class="table table-striped task-table">
		<!-- Table Headings -->
		<thead>
			<tr>
				<th>No.</th>
				<th>Paper ID</th>
				<th>Paper Name</th>
				<th>Author</th>
				<th>Conference</th>
			</tr>
		</thead>

		<!-- Table Body -->
		<tbody>
			@foreach ($papers as $i => $paper)
			<tr>
				<td class="table-text">
					<div>{{ $i+1 }}</div>
				</td>
				<td class="table-text">
					<div>
					{!! link_to_route(
						'paper.show',
						$title = $paper->name,
						$parameters = [
							'id' => $paper->id,
						]
					) !!}
					</div>
				</td>
				<td class="table-text">
					<div>{{ $paper->paper_id }}</div>
				</td>
				<td class="table-text">
					<div>{{ Author::pluck('name','id')[$paper->author_id] }}</div>
				</td>
				<td class="table-text">
					<div>{{ Conference::pluck('name','id')[$paper->conf_id] }}</div>
				</td>
				<td class="table-text">
					<div>
					<a href="/paper/<?php echo $paper->id; ?>/edit">Edit</a>
					</div>
				</td>
				<td class="table-text">
					<form action="/paper/<?php echo $paper->id; ?>" method="POST">
						{{ csrf_field() }}
						<input type="submit" value="Delete"/>
						<input type="hidden" name="_method" value="DELETE">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<div>
		No records found
	</div>
	@endif
</div>
@endsection
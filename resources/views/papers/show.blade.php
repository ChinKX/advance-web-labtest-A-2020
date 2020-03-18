<?php

use App\Common;
use App\Division;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
	<table class="table table-striped task-table">
		<!-- Table Headings -->
		<thead>
			<tr>
				<th>Attribute</th>
				<th>Value</th>
			</tr>
		</thead>

		<!-- Table Body -->
		<tbody>
			<tr>
				<td class="table-text">
				<td>Paper Name</td>
					<div>{{ $paper->name }}</div>
				</td>
			</tr>
			<tr>
				<td>Paper ID</td>
				<td class="table-text">
					<div>{{ $paper->paper_id }}</div>
				</td>
			</tr>
			<tr>
				<td>Author Name</td>
				<td>{{ $paper->author()->name }}</td>
			</tr>
			<tr>
				<td>Conference Name</td>
				<td>{{ $paper->conference()->name }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection
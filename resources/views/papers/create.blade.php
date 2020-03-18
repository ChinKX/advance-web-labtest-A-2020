<?php

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
	<!-- New Member Form -->
	{!! Form::model($paper, [
		'route' => ['paper.store'],
		'class' => 'form-horizontal'
	]) !!}

	<!-- Code -->
	<div class="form-group row">
		{!! Form::label('paper-paper_id', 'Paper ID', [
			'class' => 'control-label col-sm-3',
		]) !!}
		<div class="col-sm-9">
		{!! Form::text('paper_id', null, [
			'id' => 'paper-paper_id',
			'class' => 'form-control',
			'maxlength' => 50,
		]) !!}
		</div>
	</div>

	<!-- Name -->
	<div class="form-group row">
		{!! Form::label('paper-name', 'Name', [
			'class' => 'control-label col-sm-3',
		]) !!}
		<div class="col-sm-9">
		{!! Form::text('name', null, [
			'id' => 'paper-name',
			'class' => 'form-control',
			'maxlength' => 100,
		]) !!}
		</div>
	</div>

	<!-- Author ID -->
	<div class="form-group row">
		{!! Form::label('author-id', 'Author ID', [
			'class' => 'control-label col-sm-3',
		]) !!}
		<div class="col-sm-9">
			{!! Form::select('author_id',
				$authors,
				null, [
					'class' => 'form-control',
					'placeholder' => '- Select Author -',
				])
			!!}
		</div>
	</div>

	<!-- Author ID -->
	<div class="form-group row">
		{!! Form::label('conference-id', 'Conference ID', [
			'class' => 'control-label col-sm-3',
		]) !!}
		<div class="col-sm-9">
			{!! Form::select('conf_id',
				$conferences,
				null, [
					'class' => 'form-control',
					'placeholder' => '- Select Conference -',
				])
			!!}
		</div>
	</div>

	<!-- Submit Button -->
	<div class="form-group row">
		<div class="col-sm-offset-3 col-sm-6">
			{!! Form::button('Save', [
			'type' => 'submit',
			'class' => 'btn btn-primary',
			]) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>

@endsection
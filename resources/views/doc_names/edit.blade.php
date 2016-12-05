@extends('layouts.master')
@section('page-content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<a href="{{ URL::previous() }}" class="btn btn-primary" style="margin-bottom: 15px;"><i class="fa fa-replay"></i> Back</a>
				<div class="panel panel-default">
					<div class="panel-heading">Create</div>
					<div class="panel-body">
						{{ Form::open(['route' => ['doc_names.update' , $id] , 'method' => 'PUT'])}}
							<div class="form-group">
								<label for="name">Doc Name</label>
								<input type="text" name="name" id="name" value="{{ $doc_name->name }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" name="slug" id="slug" value="{{ $doc_name->slug }}" class="form-control">
							</div>
							<div class="form-group">
								<button class="btn btn-info">Save</button>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

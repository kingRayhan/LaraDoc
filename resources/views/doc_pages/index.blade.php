@extends('layouts.master')


@section('page-content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3>All Pages of: {{$doc_name}}</h3>
			<br>
			<a href="{{ route('doc_pages.create',$doc_name_id) }}" class="btn btn-primary">Create new Page</a>
			<a class="btn btn-info" href="{{ route('doc_names.index') }}">All Docs</a>
			@if($trashed_count)
				<a href="{{ route('doc_pages.trashed',$doc_name_id) }}" class="btn btn-danger">Trashed <span class="badge">{{ $trashed_count }}</span>
			</a>
			@endif
			<br>
			<br>
				<div class="panel panel-default">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="45%">Page name</th>
									<th width="20%">Slug</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($doc_pages as $doc)
									<tr>
										<td>{{ $doc->name }}</td>
										<td>{{ $doc->slug }}</td>
										<td>
											<a class="btn btn-primary" href="{{ route('doc_pages.editDocPage' , [$doc->id , $doc->doc_name_id]) }}">Edit</a>
											<a class="btn btn-danger" href="#" 
												onclick="event.preventDefault();document.getElementById('delete-doc-page-{{$doc->id}}').submit();" 	
											>Delete</a>
{{ Form::open(['route'=>['doc_pages.destroy',$doc->id],'id'=>'delete-doc-page-'.$doc->id , 'method'=>'DELETE']) }}{{ Form::close() }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
				</div>

			</div>
		</div>
	</div>
@stop
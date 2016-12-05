@extends('layouts.master')
@section('page-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			<a href="{{ route('doc_names.create') }}" class="btn btn-primary" style="margin-bottom: 15px;">Create new Doc</a>
			@if($trashed_count)
			<a href="{{ route('doc_names.trashed') }}" class="btn btn-danger" style="margin-bottom: 15px;">Trashed <span class="badge">{{ $trashed_count }}</span>
			</a>
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Docs</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="40%">Doc Name</th>
									<th width="20%">Slug</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($docs as $doc)
									<tr>
										<td>{{ $doc->name }}</td>
										<td>{{ $doc->slug }}</td>
										<td>
												<a href="{{ route('doc_pages.index' , $doc->id) }}" class="btn btn-primary">See all Page(s) <span class="badge">{{ $doc->doc_page->count() }}</span></a>
												<a href="{{ route('doc_names.edit' , $doc->id) }}" class="btn btn-info">Edit</a>
												<a href="#"
													onclick="event.preventDefault(); document.getElementById('delete-doc-name-{{ $doc->id }}').submit();"
													class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
													{{ Form::open(['route'=> ['doc_names.destroy',$doc->id] , 'id' => 'delete-doc-name-'.$doc->id , 'method' => 'DELETE']) }}{{ Form::close() }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

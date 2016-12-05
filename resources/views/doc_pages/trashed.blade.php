@extends('layouts.master')
@section('page-content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<h3>Trash of: <a href="{{ route('doc_pages.index' , $doc_name_id) }}">{{ $doc_name }}</a></h3>
			<br>
			<a class="btn btn-primary" href="{{ route('doc_pages.index' , $doc_name_id) }}">All pages</a>
			@if($trashed_count)
			<a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('clearTrashed').submit();">Clear Trashed</a>
			{{ Form::open(['id'=>'clearTrashed' , 'route' => ['doc_pages.clearTrashed',$doc_name_id] , 'method' => 'PUT']) }}{{ Form::close() }}
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Docs</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="50%">Doc Page Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($docs as $doc)
									<tr>
										<td> {{$doc->name}} </td>
										<td>
												<button
													class="btn btn-success"
													onclick="document.getElementById('restore_doc_page_{{$doc->id}}').submit();">Restore</button>
												<button
													class="btn btn-danger"
													onclick="document.getElementById('delete_parmanently_doc_page_{{$doc->id}}').submit();">Delete
												</button>
												{{ Form::open([ 
													'route' => ['doc_pages.restore',$doc->id] , 
													'method'=> 'PUT', 
													'id' => 'restore_doc_page_'.$doc->id]) 
												}}{{ Form::close() }}

												{{ Form::open([ 
													'route' => ['doc_pages.forceDelete',$doc->id] , 
													'method'=> 'PUT',
													'id' => 'delete_parmanently_doc_page_'.$doc->id]) 
												}}{{ Form::close() }}
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
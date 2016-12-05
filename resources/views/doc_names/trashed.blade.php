@extends('layouts.master')


@section('page-content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<a class="btn btn-primary" href="{{ route('doc_names.index') }}">All Doc Names</a>
			@if($trashed_count)
			<a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('clearTrashed').submit();">Clear Trashed</a>
					{{ Form::open(['id'=>'clearTrashed' , 'route' => 'doc_names.clearTrashed' , 'method' => 'PUT']) }}{{ Form::close() }}
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Docs</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Doc Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($docs as $doc)
									<tr>
										<td>{{ $doc->name }}</td>
										<td>
											<div class="btn-group">
												<button
													class="btn btn-success"
													onclick="document.getElementById('restore_doc_name_{{$doc->id}}').submit();">Restore</button>
												<button
													class="btn btn-danger"
													onclick="document.getElementById('delete_parmanently_doc_name_{{$doc->id}}').submit();">Delete
												</button>
												{{ Form::open([ 
													'route' => ['doc_names.restore',$doc->id] , 
													'method'=> 'PUT', 
													'id' => 'restore_doc_name_'.$doc->id]) 
												}}{{ Form::close() }}

												{{ Form::open([ 
													'route' => ['doc_names.forceDelete',$doc->id] , 
													'method'=> 'DELETE',
													'id' => 'delete_parmanently_doc_name_'.$doc->id]) 
												}}{{ Form::close() }}
											</div>
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
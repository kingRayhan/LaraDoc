@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> 	
		@foreach($errors->all() as $error)
				{{ $error }}
		@endforeach
</div>
@endif


@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{ Session::get('success') }}
</div>
@endif
@extends('layouts.master')
@section('footer')
{{-- markdown Previewer --}}
{{ Html::script('js/vue.min.js') }}
{{ Html::script('js/marked.min.js') }}
<script>
/**
 * Markdown
 */
let init ='';

new Vue({
  el: '#markdownWrapper',
  data: {
    input: init
  },
  methods: {
    bold: function() {
      var word = 'Make me bold';
      $('.input').val(function(i, v) { //index, current value
        return v.replace(word, `**${word}**`);
      });
    },
    
    triggerChange: function() {
      
    }
  },
  filters: {
    marked: marked
  }
})

function getHighlighted(e) {
  var select = window.getSelection().toString();
  
  return select;
}

$(document).on('mouseup', function() {
  const bob = getHighlighted();
  console.log(bob);
});
</script>

@stop
@section('page-content')
	<div class="container-fluid">
		<div class="row" id="markdownWrapper">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Create page</div>

					<div class="panel-body">
						{{ Form::open(['route' => ['doc_pages.store',$doc_name_id] , 'method' => 'POST'])}}
							<div class="form-group">
								<label for="name">Title</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" name="slug" id="slug" class="form-control">
							</div>
							<div class="form-group">
								<label for="body">Contents</label>
								<textarea v-model="input" name="body" id="body" class="form-control" style="width: 100%; height: 575px;"></textarea>
							</div>
							<input type="hidden" name="doc_name_id" value="{{ $doc_name_id }}">
							<div class="form-group">
								<button class="btn btn-info">Save</button>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Preview</div>
					<div class="panel-body">
						<div v-html="input | marked" class="output" style="width: 100%; height: 750px; overflow-y: scroll;"></div>  
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
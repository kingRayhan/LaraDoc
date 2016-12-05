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
</script>

@stop
@section('page-content')
	<div class="container-fluid">
		<div class="row" id="markdownWrapper">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Edit page</div>

					<div class="panel-body">
						{{ Form::open(['route' => ['doc_pages.update',$doc_page->id] , 'method' => 'PUT'])}}
              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="name" value="{{ $doc_page->name }}" id="name" class="form-control">
              </div>
							<div class="form-group">
								<label for="name">Slug</label>
								<input type="text" name="slug" value="{{ $doc_page->slug }}" id="slug" class="form-control">
							</div>
							<div class="form-group">
								<label for="body">Doc Body</label>
								<textarea v-model="input" name="body" id="body" class="form-control" style="width: 100%; height: 575px;">{{ $doc_page->body }}</textarea>
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
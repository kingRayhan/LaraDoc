@extends('layouts.master')
@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/anchor-js/3.2.2/anchor.min.js"></script>
<script>
    anchors.add('.doc-body h1 , .doc-body h2 , .doc-body h3 , .doc-body h4 , .doc-body h5 , .doc-body h6');
</script>
@endsection
@section('page-content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('partials._docNav')
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ $doc_page->name }}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="doc-body">
                          {!! $doc_page_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
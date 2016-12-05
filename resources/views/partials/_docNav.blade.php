 <div class="logo-container">
 	 <a href="{{ url('/') }}"><img src="images/logo.png"></a>
 </div>
<br>
<br>
 <aside class="doc-menu" id="leftmenuinnerinner">
 @if(count($doc_names))
     @foreach($doc_names as $name)
          <h4 class="doc-menu-heading">{{$name->name}}</h4>
          <ul class="list-unstyled">
               @foreach($name->doc_page as $page)
                    <li><a href="{{ route('getDocSinglePage' , [$name->slug , $page->slug]) }}">{{ $page->name }}</a></li>
               @endforeach
          </ul>
     @endforeach
   @endif
 </aside>

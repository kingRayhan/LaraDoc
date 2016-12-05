<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocPage;
use App\DocName;
use Session;
// MarkDown
use League\CommonMark\CommonMarkConverter;

use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Webuni\CommonMark\TableExtension\TableExtension;

$environment = Environment::createCommonMarkEnvironment();
$environment->addExtension(new TableExtension());

$converter = new Converter(new DocParser($environment), new HtmlRenderer($environment));

class DocPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    //


    public function getDocPages($id){
        $doc_pages = DocPage::where('doc_name_id',$id)->get();
        $doc_name_id = $id;
        $trashed_count = DocPage::onlyTrashed()->where('doc_name_id',$id)->count();
        $doc_name = DocName::find($id)->name;
        return view('doc_pages.index',compact('doc_pages','doc_name_id','trashed_count','doc_name'));

    }
    public function getDocSinglePage($doc_name_slug,$doc_page_slug){
        $doc_name_id = DocName::where('slug',$doc_name_slug)->first()->id;
        $doc_page = DocPage::where('doc_name_id',$doc_name_id)->where('slug',$doc_page_slug)->first();

        $doc_page_body = $doc_page->body;
        $converter = new CommonMarkConverter([
            'renderer' => [
                'block_separator' => "\n",
                'inner_separator' => "\n",
                'soft_break'      => "\n",
            ],
            'enable_emphasis' => true,
            'enable_strong' => true,
            'use_asterisk' => true,
            'use_underscore' => true,
            'html_input' => 'allow', // escape
            'allow_unsafe_links' => false,
        ]);
        $doc_page_content = $converter->convertToHtml($doc_page_body);
        return view('doc_pages.single',compact('doc_page_content','doc_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function CreateDocPage($doc_name_id){
        return view('doc_pages.create',compact('doc_name_id'));
    }

    public function trashedIndex($id){
        $docs = DocPage::onlyTrashed()->where('doc_name_id',$id)->get();
        $trashed_count = DocPage::onlyTrashed()->where('doc_name_id',$id)->count();
        $doc_name = DocName::find($id)->name;
        $doc_name_id = $id;
        return view('doc_pages.trashed',compact('docs','doc_name','doc_name_id','trashed_count'));
    }
    public function restore($id){
        DocPage::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
    public function forceDelete($id){
        DocPage::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
    function clearTrashed($id){
        DocPage::onlyTrashed()->where('doc_name_id',$id)->forceDelete();
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:doc_pages,name'
        ]);
        $doc_page = new DocPage;
        $doc_page->name = $request->name;
        $doc_page->slug = $request->slug;
        $doc_page->body = $request->body;
        $doc_page->doc_name_id = $request->doc_name_id;
        $doc_page->save();
        return redirect()->route('doc_pages.index',$request->doc_name_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    public function editDocPage($id,$doc_name_id)
    {
        $doc_page = DocPage::find($id);
        return view('doc_pages.edit',compact('id','doc_name_id','doc_page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc_page = DocPage::find($id);
        if ($request->slug == $doc_page->slug) {
            $this->validate($request,[
                'name' => 'required',
                'body' => 'required',
                'slug' => 'alpha_dash'
            ]);
        }else if($request->name == $doc_page->name){
            $this->validate($request,[
                'name' => 'required',
                'body' => 'required',
                'slug' => 'alpha_dash'
            ]);
        }else{
            $this->validate($request,[
                'name' => 'required|unique:doc_pages,name',
                'body' => 'required',
                'slug' => 'alpha_dash|unique:doc_pages,slug'
            ]);
        }
        $doc_page->name = $request->name;
        $doc_page->slug = $request->slug;
        $doc_page->body = $request->body;
        $doc_page->save();
        Session::flash('success','Page updated successfully!!');
        return redirect()->route('doc_pages.index',$request->doc_name_id);
    }

    public function destroy($id)
    {
        DocPage::destroy($id);
        return redirect()->back();
    }
}

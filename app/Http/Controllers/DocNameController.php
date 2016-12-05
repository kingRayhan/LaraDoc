<?php

namespace App\Http\Controllers;
use App\DocName;
use App\DocPage;
use Session;

use Illuminate\Http\Request;

class DocNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = DocName::orderBy('id','desc')->get();
        $trashed_count = DocName::onlyTrashed()->count();
        return view('doc_names.index',compact('docs','trashed_count'));
    }

    public function trashedIndex(){
        $docs = DocName::onlyTrashed()->orderBy('id','desc')->get();
        $trashed_count = DocName::onlyTrashed()->count();
        return view('doc_names.trashed',compact('docs','trashed_count'));
    }
    public function forceDelete($id){
        DocName::onlyTrashed()->whereId($id)->forceDelete();
        DocPage::onlyTrashed()->where('doc_name_id',$id)->forceDelete();
        return redirect()->route('doc_names.trashed');
    }
    public function restore($id){
        DocName::onlyTrashed()->whereId($id)->restore();
        DocPage::where('doc_name_id',$id)->restore();
        return redirect()->route('doc_names.trashed');
    }

    function clearTrashed(){
        DocName::onlyTrashed()->forceDelete();
        return redirect()->route('doc_names.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doc_names.create');
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
            'name' => 'required|unique:doc_names,name',
            'slug' => 'required|Alpha_dash|unique:doc_names,slug',
        ]);
        $doc_name = new DocName;
        $doc_name->name = $request->name;
        $doc_name->slug = $request->slug;
        $doc_name->save();
        return redirect()->route('doc_names.index');
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
        $doc_name = DocName::find($id);
        return view('doc_names.edit',compact('id','doc_name'));
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
        $doc_name = DocName::find($id);
        if ($doc_name->slug == $request->slug) {
            $this->validate($request,[
                'name' => 'required',
                'slug' => 'required|alpha_dash',
            ]);
        }else{
            $this->validate($request,[
                'name' => 'required',
                'slug' => 'required|Alpha_dash|unique:doc_names,slug',
            ]);
        }
        $doc_name->name = $request->name;
        $doc_name->slug = $request->slug;
        $doc_name->save();
        return redirect()->route('doc_names.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        DocName::destroy($id);
        DocPage::where('doc_name_id',$id)->delete();
        return redirect()->back();
    }
}

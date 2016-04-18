<?php

namespace Community\Http\Controllers;

use Illuminate\Http\Request;
use Community\Http\Requests;
use Community\Http\Controllers\Controller;

use Community\Tags;
use Community\PostsTags;

class TagsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
    
    public function getAllTag(){
        $tag_css = array(
            'label-default',
            'label-success',
            'label-warning',
            'label-info' );
        $page_title = "All Tags";
        $tags = Tags::all();
        $data = compact('page_title','tags','tag_css');
        return view('tags.index',$data);
    }
 
}
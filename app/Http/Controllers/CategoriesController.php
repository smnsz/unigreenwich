<?php

namespace Community\Http\Controllers;

use Illuminate\Http\Request;
use Community\Http\Requests;
use Community\Http\Controllers\Controller;
use Community\Categories;
use Validator;

class CategoriesController extends Controller
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
    public function getCreate(){
        $page_title = 'Add Category';
        $categories = Categories::all();
        $data = compact('page_title','categories');
        return view('categories.create',$data);
    }
    
    public function postCreate(Request $request){
        $page_title = 'Add Category';
        
        $all = $request->all();
        $validator = Validator::make($all, [
            'name' => 'required|max:255|unique:categories,name'
        ]);
        if ($validator->fails()) {
            $categories = Categories::all();
            $data = compact('page_title','categories');
            return view('categories.create',$data)
                ->withErrors($validator->errors());
   
        }
        Categories::create([
            'name' => $all['name']
        ]); 
        return redirect(route('getCategoryCreate'));       
    }
    
    public function getAllCategory(){
        $page_title = 'All Categories';
        $categories = Categories::all();
        $data = compact('page_title','categories');
        return view('categories.index',$data);
    }
}
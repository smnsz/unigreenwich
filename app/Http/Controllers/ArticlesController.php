<?php

namespace Community\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends BaseController
{
	protected $articles;
	    
    public function articles()
    {
    	return view('articles.grid');
    }
	
}
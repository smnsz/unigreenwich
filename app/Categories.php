<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $table = 'categories';
	
	protected $fillable = ['name'];
	
	public $timestamps = false;
	
	public function posts()
	{
		return $this->hasMany('Community\Posts', 'category_id');
	}
}
<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
	protected $table = 'tags';
	
	protected $fillable = ['name','normalized'];
	
    public function posts()
    {
        return $this->belongsToMany('Community\Posts', 'posts_tags', 'tag_id', 'post_id');
    }
}
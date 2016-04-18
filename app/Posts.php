<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	protected $table = 'posts';
	
    protected $fillable = ['title', 'content', 'active', 'user_id','category_id','markdown_content'];
    
	public function user() 
	{
		return $this->belongsTo('Community\User');
	}
	
	public function category() 
	{
		return $this->belongsTo('Community\Categories');
	}
	
	public function tags()
    {
        return $this->belongsToMany('Community\Tags', 'posts_tags', 'post_id', 'tag_id');
    }
    
    public function comments() 
    {
      return $this->hasMany('Community\Comments','post_id');
    }
}
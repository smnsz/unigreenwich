<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $table = 'comments';
	
	protected $fillable = ['comment', 'post_id', 'user_id'];
	
	public function user()
	{
		return $this->belongsTo('Community\User');
	}
	
	public function post()
	{
		return $this->belongsTo('Community\Posts');
	}
}
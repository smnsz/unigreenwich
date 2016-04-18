<?php
namespace Community;
use Illuminate\Database\Eloquent\Model;
class EventComments extends Model
{
	protected $table = 'event_comments';
	
	protected $fillable = ['comment', 'event_id', 'user_id'];
	
	public function user()
	{
		return $this->belongsTo('Community\User');
	}
	
	public function post()
	{
		return $this->belongsTo('Community\Events');
	}
}
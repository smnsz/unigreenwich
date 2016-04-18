<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Booking extends Model
{
	use SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
    	'booker',
    	'note',
        'kicked'
    	];

	protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('Community\User', 'booker');
    }

    public function creator()
    {
        return $this->belongsTo('Community\User', 'owner');
    }
    
    public function eventData()
    {
        return $this->belongsTo('Community\Event', 'event');
    }
}
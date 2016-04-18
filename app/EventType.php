<?php
namespace Community;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{

	use SoftDeletes;

    protected $table = 'eventTypes';

    protected $fillable = [
    	'owner',
    	'title',
        'description',
        'location',
        'capacity'
    	];

	protected $guarded = array('id');
}
<?php 
namespace Community;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Carbon\Carbon;

class Event extends Model {

	use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
    	'title',
    	'host',
        'description',
        'capacity',
        'location',
    	'start_time',
    	'end_time'
    	];

	protected $guarded = array('id');

    protected $appends = array('start_time_friendly', 'end_time_friendly');

    public function getStartTimeFriendlyAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->start_time)->format('m/d H:i:s');
    }

    public function getEndTimeFriendlyAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->end_time)->format('m/d H:i:s');
    }

	public function creator()
    {
        return $this->belongsTo('Community\User', 'host');
    }
    
    public function bookings()
    {
        return $this->hasMany('Community\Booking', 'event', 'id')->where('kicked', '0');
    }
    
    public function eventType()
    {
        return $this->belongsTo('Community\EventType', 'type');   
    }

    public function scopeHosted($query)
    {
        return $query->where('host', Auth::id());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>' ,  Carbon::now());   
    }

    public function scopeBelongsToOthers($query)
    {
        return $query->where('host', '<>', Auth::id());
    }

    public function scopeNotBooked($query)
    {
        return $query->where( function($query){
            // Event with booking and not booked by current user
            $query->whereRaw('events.capacity > (select count(*) from bookings where bookings.event = events.id)')
                ->whereRaw( Auth::id() . ' not in (select booker from bookings where events.id = bookings.event and bookings.deleted_at is null)');
            // Event with unlimited capacity
            })->orwhere(function($query){
                $query->where( 'events.capacity', '0')
                ->whereRaw( Auth::id() . ' not in (select booker from bookings where events.id = bookings.event and bookings.deleted_at is null)');
            });
    }

    public function scopeBooked($query){
        return $query->whereHas('bookings', function ($query) {
            $query->where('booker', Auth::id());
        });
    }

    public function scopeNotKicked($query){
        return $query->whereHas('bookings', function ($query) {
            $query->where('kicked', '0');
        });   
    }
}
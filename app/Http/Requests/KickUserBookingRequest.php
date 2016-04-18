<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Community\Booking;
use Community\Event;
use Auth;
use Illuminate\Http\JsonResponse;

class KickUserBookingRequest extends Request
{

    public function authorize()
    {
        $return = false;
        $booking = Booking::find($this->id);
 
        if( !is_null($booking) ){

            if( $booking->kicked == 0 ){
                $event = Event::find($booking->event);
                return $event->host == Auth::id();
            } else {
                return false;    
            }
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [];
    }
    
    public function forbiddenResponse()
    {
        return new JsonResponse('You can\'t kick this user because this event doesn\'t belong to you, doesn\'t exist or the user has already been kicked.', 403);
    }
}
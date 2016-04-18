<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Community\Event;
use Auth;
use Illuminate\Http\JsonResponse;

class IndexBookingRequest extends Request
{

    public function authorize()
    {
        $event = Event::find($this->route('id'));
        return !is_null($event) && $event->host == Auth::id();
    }

    public function rules()
    {
        return [];
    }
    
    public function forbiddenResponse()
    {
        return new JsonResponse('You can\'t view bookings on this event because you are not the owner or this event doesn\'t exist.', 403);
    }
}
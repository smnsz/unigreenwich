<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Community\Event;
use Auth;

class UpdateEventRequest extends Request
{

    public function authorize()
    {
        $event = Event::find($this->route('id'));
        return !is_null($event) && $event->host == Auth::id();
    }

    public function rules()
    {
        return [
            'title' => 'required|min:1|max:255',
            'start_time' => 'required|date|after:tomorrow',
            'end_time' => 'required|date|after:start_time',
            'description' => 'max:255',
            'location' => 'max:30',
            'capacity' => 'integer',
        ];
    }
    
    public function forbiddenResponse()
    {
        return new JsonResponse('You can\'t update this event!', 403);
    }
}
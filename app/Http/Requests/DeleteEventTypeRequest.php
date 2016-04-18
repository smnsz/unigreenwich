<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Community\EventType;
use Auth;

class DeleteEventTypeRequest extends Request
{

    public function authorize()
    {
        $eventType = EventType::find($this->route('id'));
        return !is_null($eventType) && $eventType->owner == Auth::id();
    }

    public function rules()
    {
        return [
            //
        ];
    }
    public function forbiddenResponse()
    {
        return new JsonResponse('You can\'t delete this event type!', 403);
    }
}
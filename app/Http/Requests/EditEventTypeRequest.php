<?php
namespace Community\Http\Requests;
use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Auth;
use Community\EventType;
class EditEventTypeRequest extends Request
{

    public function authorize()
    {
        $eventType = EventType::find($this->id);
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
        return new JsonResponse('You can\'t edit this event type!', 403);
    }
}
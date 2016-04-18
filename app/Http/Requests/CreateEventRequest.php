<?php
namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Community\EventType;
use Auth;

class CreateEventRequest extends Request
{

    public function authorize()
    {
        $id = $this->route('id');
        if( !is_null($id) ){
            $eventType = EventType::find($id);
            return !is_null($eventType) && $eventType->owner == Auth::id();
        } else {
            return true;
        }
    }

    public function rules()
    {
        return [
            //
        ];
    }
    public function forbiddenResponse()
    {
        return new JsonResponse('You can\'t create this event because you are not the owner of this event type or it doesn\'t exist.', 403);
    }
}
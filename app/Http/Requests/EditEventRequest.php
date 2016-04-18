<?php
namespace Community\Http\Requests;
use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Auth;
use Community\Event;
class EditEventRequest extends Request
{

    public function authorize()
    {
        $event = Event::find($this->id);
        return !is_null($event) && $event->host == Auth::id();
    }

    public function rules()
    {
        return [
            //
        ];
    }
    public function forbiddenResponse()
    {
        return new JsonResponse('You can\'t edit this event!', 403);
    }
}
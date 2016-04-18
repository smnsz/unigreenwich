<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Community\Event;
use Community\Booking;
use Auth;
use Carbon\Carbon;

class UnbookEventRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array();
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();
        $validator->after(function() use ($validator) {

            if( !$this->checkEventExists()){
                $validator->errors()->add('event.Exists', 'This event does not longer exist.');
            } else {

                if( !$this->checkEventNotBookedByCreator()){
                    $validator->errors()->add('event.BookedCreator', 'You can\'t unbook this event because since you are the owner.');   
                }

                if( !$this->checkEventDateNotDue()){
                    $validator->errors()->add('event.DateDue', 'You can\'t unbook this event because it\'s already begun or is terminated.');   
                }
            }
        });
        return $validator;
    }

    private function checkEventExists(){
        $event = Event::find($this->id);
        return(!is_null($event));
    }

    private function checkEventNotBookedByCreator(){
        $event = Event::find($this->id);
        return($event->host != Auth::id());
    }

    private function checkEventDateNotDue(){
        $event = Event::find($this->id);
        $now = Carbon::now();
         
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time);
        return $startTime->gt($now);
    }
}
<?php
namespace Community\Http\Requests;
use Community\Http\Requests\Request;
use Carbon\Carbon;
use Community\Event;
use Auth;
class StoreEventRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:1|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'description' => 'max:255',
            'capacity' => 'integer',
        ];
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();
        $validator->after(function() use ($validator) {

            if( $this->checkDateTimesPresent()){

                if( !$this->checkEventDateFuture()){
                    $validator->errors()->add('event.minDatetime', 'The event must be schedule from now + 2 hours in the future.');   
                }

                if( !$this->checkEventDuration()){
                    $validator->errors()->add('event.duration', 'The duration must be at least 10 minutes and less than 12 hours.');   
                }
                

                if( !$this->checkEventTimeSlotAvailable()){
                    $validator->errors()->add('event.timeSlot', 'You already have an event sharing those time frames.');
                }
            }                   
        });
        return $validator;
    }

    private function checkDateTimesPresent(){
        return $this->start_time != "" && $this->end_time != "";
    }

    private function checkEventDuration(){

        $eventStartTime = Carbon::createFromFormat('m/d/Y h:i a', $this->start_time);
        $eventEndTime = Carbon::createFromFormat('m/d/Y h:i a', $this->end_time);

        return $eventStartTime->diffInMinutes($eventEndTime) >= 10 && $eventStartTime->diffInHours($eventEndTime) <= 12;
    }

    private function checkEventTimeSlotAvailable(){

        $newEventStartTime = Carbon::createFromFormat('m/d/Y h:i a', $this->start_time);
        $newEventEndTime = Carbon::createFromFormat('m/d/Y h:i a', $this->start_time);

        $events = Event::where('host', Auth::id())->get();
        foreach ($events as $event) {
            $eventStartTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time);
            $eventEndTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->end_time);

            if( ( $newEventStartTime->between($eventStartTime, $eventEndTime) || $newEventEndTime->between($eventStartTime, $eventEndTime) ) ){
                return false;
            } 
        }
        return true;
    }

    private function checkEventDateFuture(){
        $startTime = Carbon::createFromFormat('m/d/Y h:i a', $this->start_time);
        $now = Carbon::now();
        return $now->diffInHours($startTime, false) >= 2;
    }
}
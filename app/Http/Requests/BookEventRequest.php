<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Community\Event;
use Community\Booking;
use Auth;
use Carbon\Carbon;

class BookEventRequest extends Request
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
                    $validator->errors()->add('event.BookedCreator', 'You can\'t book this event because since you are the owner.');   
                }

                if( !$this->checkNotKickedFromEvent() ){
                    $validator->errors()->add('event.Kicked', 'You can\'t book this event because you have been kicked from it by its host.');
                }

                if( !$this->checkEventNotAlreadyBookedByUser()){
                    $validator->errors()->add('event.AlreadyBooked', 'You already have booked this event.');
                }

                if( !$this->checkEventNotAtSameTime()){
                    $validator->errors()->add('event.SameTimeBooking', 'You can\'t book this event because one event you booked is at the same time.');   
                }

                if( !$this->checkEventDateNotDue()){
                    $validator->errors()->add('event.DateDue', 'You can\'t book this event because it\'s already begun or is terminated.');   
                }

                if( !$this->checkEventNotFull()){
                    $validator->errors()->add('event.CapacityReached', 'You can\'t book this event because its maximum capacity is reached.');   
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

    private function checkEventNotAlreadyBookedByUser(){
        return count(Booking::where('event', $this->id)->where('booker', Auth::id())->where('kicked', '0')->get()) == 0;
    }

    private function checkEventNotAtSameTime(){
        $bookings = Booking::where('booker', Auth::id())->where('kicked', '0')->get();
        $eventToBook = Event::find($this->id);

        foreach ($bookings as $booking) {
            $event = Event::find($booking->event);
            if(!is_null($event)){

                $eventToBookStartTime = Carbon::createFromFormat('Y-m-d H:i:s', $eventToBook->start_time);
                $eventToBookEndTime = Carbon::createFromFormat('Y-m-d H:i:s', $eventToBook->end_time);

                $eventStartTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time);
                $eventEndTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->end_time);

                if( ( $eventToBookStartTime->between($eventStartTime, $eventEndTime) || $eventToBookEndTime->between($eventStartTime, $eventEndTime) ) ){
                    return false;
                } 
            }
        }
        return true;
    }

    private function checkEventDateNotDue(){
        $event = Event::find($this->id);
        $now = Carbon::now();
         
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time);
        return $startTime->gt($now);
    }

    private function checkEventNotFull(){
        $event = Event::find($this->id);
        $bookings = Booking::where('event', $this->id)->get();

        return (count($bookings) < $event->capacity) || ($event->capacity == 0);
    }

    private function checkNotKickedFromEvent(){
        $event = Event::find($this->id);
        $booking = Booking::where('event', $this->id)->where('booker', Auth::id())->where('kicked', '1')->get();
 
        return (count($booking) == 0);
    }
}
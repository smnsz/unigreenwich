<?php

namespace Community\Http\Controllers;

use Illuminate\Http\Request;
use Community\Http\Requests;
use Community\Http\Controllers\Controller;

use DB;
use Auth;
use Community\Event;
use Community\EventType;

use Community\Http\Requests\StoreEventRequest;
use Community\Http\Requests\UpdateEventRequest;
use Community\Http\Requests\DeleteEventRequest;
use Community\Http\Requests\EditEventRequest;
use Community\Http\Requests\CreateEventRequest;

use Community\EventComments;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Enable query log
        //\DB::connection()->enableQueryLog();
        // Upcoming available events
        if( !is_null($request->available) && $request->available ==1 ){
            $events = Event::belongsToOthers()->notBooked()->notKicked();
        // Hosted events
        } else if( !is_null($request->hosted) && $request->hosted ==1 ){
            $events = Event::hosted();
        // Booked events
        } else if( !is_null($request->booked) && $request->booked ==1 ){
            $events = Event::booked()->notKicked();
        } else {
            $events = Event::upcoming();
        }
        // Order by start time for now by default
        $events = $events->upcoming()->orderBy('start_time', 'asc');
        // include bookings
        if($request->bookings == 1){
            $events = $events->with('bookings');
        }
        // include creator details
        if($request->creator == 1){
            $events = $events->with('creator'); 
        }
        // To remove
        // $events = $events->get();
        // some queries here
        // $queries = \DB::getQueryLog();
        // dd($queries); 
        return response()->json($events->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(CreateEventRequest $request, $id = null)
    {
        $eventType = is_null($id) ? new EventType : EventType::find($id);
        return view('events.create')->with('eventType', $eventType);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreEventRequest $request)
    {
        // Populates the event
        $event = new Event;
        $event->start_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->input('start_time'))));
        $event->end_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->input('end_time'))));
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->capacity = $request->input('capacity');
        // The host is the current connected user
        $event->host = Auth::id();
        // Saves it
        $event->save();
        // Return show form
        return redirect()->action('EventsController@show', [$event->id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', ['event' => $event]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(EditEventRequest $request, $id)
    {
        $event = Event::find($id);
        return view('events.edit', ['event' => $event]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::find($id);
        // Populates the event
        $event->start_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->input('start_time'))));
        $event->end_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->input('end_time'))));
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->capacity = $request->input('capacity');
        
        // Saves it
        $event->save();
        // Return current event in JSON
        return redirect()->action('EventsController@show', ['event' => $event]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(DeleteEventRequest $request, $id)
    {
        // Event validation
        $event = Event::find($id);
        $event->delete();
        // Return JSON
        return response()->json(array('success' => true));
    }
    
    function postComment(Request $request){
        $all = $request->all();
        $validator = Validator::make($all, [
            'comment' => 'required'
        ]); 
        if ($validator->fails()) {
            $id = $all['id'];
            $event = Events::findOrFail($id);
            $page_title = $post->title;
            
            $data = compact('event','event_title');
            return view('events.show',$data)
                ->withErrors($validator->errors());
   
        }  
        $comment = Purifier::clean($all['comment'], 'markdown');;
        $user_id = Auth::user()->id;
        $event_id = $all['id'];
        $event = Comments::create([
            'comment' => $comment,
            'event_id' => $event_id,
            'user_id' => $user_id
        ]); 
        return redirect(route('getEventShow',$post_id));
    }    
}
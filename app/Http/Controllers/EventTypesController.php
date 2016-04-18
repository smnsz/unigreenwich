<?php

namespace Community\Http\Controllers;

use Illuminate\Http\Request;
use Community\Http\Requests;
use Community\Http\Requests\StoreEventTypeRequest;
use Community\Http\Requests\EditEventTypeRequest;
use Community\Http\Requests\UpdateEventTypeRequest;
use Community\Http\Requests\DeleteEventTypeRequest;
use Community\Http\Controllers\Controller;
use Community\EventType;

use Auth;

class EventTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $eventTypes = EventType::where('owner', Auth::id());
        return response()->json($eventTypes->get()); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('event-types.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreEventTypeRequest $request)
    {
        // Populates the event
        $eventType = new eventType;
        $eventType->title = $request->input('title');
        $eventType->description = $request->input('description');
        $eventType->capacity = $request->input('capacity');
        // The host is the current connected user
        $eventType->owner = Auth::id();
        // Saves it
        $eventType->save();
        // Return show form
        return view('event-types.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(EditEventTypeRequest $request, $id)
    {
        $eventType = EventType::find($id);
        return view('event-types.edit', ['eventType' => $eventType]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateEventTypeRequest $request, $id)
    {
        $eventType = EventType::find($id);
        // Populates the event
        $eventType->title = $request->input('title');
        $eventType->description = $request->input('description');
        $eventType->capacity = $request->input('capacity');
        
        // Saves it
        $eventType->save();
        // Return current event in JSON
        return redirect()->action('EventTypesController@edit', ['eventType' => $eventType]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(DeleteEventTypeRequest $request, $id)
    {
        $eventType = EventType::find($id);
        $eventType->delete();
        // Return JSON
        return response()->json(array('success' => true));
    }
}
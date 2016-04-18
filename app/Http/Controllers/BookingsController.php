<?php

namespace Community\Http\Controllers;

use Illuminate\Http\Request;
use Community\Http\Requests;
use Community\Http\Requests\UnbookEventRequest;
use Community\Http\Requests\IndexBookingRequest;
use Community\Http\Requests\KickUserBookingRequest;
use Community\Http\Controllers\Controller;
use Auth;

use Community\Booking;
use Community\Http\Requests\BookEventRequest;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(IndexBookingRequest $request, $id)
    {
        return response()->json(Booking::where('event', $id)->where('kicked', 0)->with('user')->with('eventData')->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BookEventRequest $request, $id)
    {        
        // Populates the booking
        $booking = new Booking;
        $booking->event = $id;
        $booking->booker = Auth::id();
        $booking->save();
        // Return all events view from controller
        return redirect()->action('EventsController@index');
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
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(UnbookEventRequest $request, $id)
    {   
        $booking = Booking::where('event', $id)->where('booker', Auth::id())->first();
        $booking->delete();
        // Return JSON
        return response()->json(array('success' => true));
    }
    /**
     * Set the booking as kicked in the storage.
     *
     * @param  KickUserBookingRequest  $request
     * @param  int  $id booking id
     * @return Response
     */
    public function kick(KickUserBookingRequest $request, $id){
        $booking = Booking::find($id);
        // Set the kicked tag to 1
        $booking->kicked = 1;
        $booking->save();
        // Return JSON
        return response()->json(array('booking' => $booking));   
    }
}
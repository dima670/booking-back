<?php

namespace App\Http\Controllers\API;

use App\Calendar;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CalendarCollection;
use App\Http\Resources\Calendar as CalendarResource;
use Illuminate\Http\Request;

class CalendarController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('room')) {
            $roomId = $request->input('room');
            $calendars = Calendar::whereHas('room', function ($q) use ($roomId) {
                $q->where('id', '=', $roomId);
            })->with(['payment', 'client'])->get();
        } else {
            $calendars = Calendar::with(['payment', 'client'])->get();
        }
        $response = new CalendarCollection($calendars);
        return $this->sendResponse($response, 'Success Ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calendar = new Calendar();
        $client = $request->input('client');
//        $payment = $request->input('payment');
        $clientArr = json_decode($client);
        if (!array_key_exists('id', $clientArr)) {
            $client = $calendar->client()->create($client);
        }

        $calendar->fill($request->only([
            'room_id',
            'time_from',
            'time_to',
            'comment',
        ]));

        $calendar->client()->associate($client);

//        $calendar->payment()->updateOrCreate($payment);

        $calendar->push();

        $response = $calendar->load(['payment', 'client']);
        return $this->sendResponse(new CalendarResource($response), 'Success Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        $calendar = $calendar->load(['payment', 'client']);
        return $this->sendResponse(new CalendarResource($calendar), 'Success Ok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        $calendar->fill($request->all());
        $calendar->save();

        $response = $calendar->load(['payment', 'client']);
        return $this->sendResponse(new CalendarResource($response), 'Success Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}

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
            $calendars = Calendar::whereHas('room', function ($q) use($roomId) {
                $q->where('id', $roomId);
            });
            $respone = new CalendarCollection($calendars);
        }
        $calendars = Calendar::all();
        return $this->sendResponse($respone, 'Success Ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
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
        //
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

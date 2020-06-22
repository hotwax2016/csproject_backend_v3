<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Event;
use App\Tourist;
use App\Post;

class EventController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'event.title' => ['required'],
            'event.description' => ['required'],
            'event.participants' => ['required'],
            /* 'event.locations' => ['required'],
            'event.activities' => ['required'], */
            'event.start' => ['required'],
            'event.end' => ['required'],
        ]);

        $event = Event::create([
            'title' => $request->input('event.title'),
            'description' => $request->input('event.description'),
            'participants' => $request->input('event.participants'),
            /* 'locations' => $request->input('event.locations'),
            'activities' => $request->input('event.activities'), */
            'start' => $request->input('event.start'),
            'end' => $request->input('event.end'),
        ]);


        $post = $event->post()->create(['guide_id' => $request->input('guide_id')]);

        return response()->json($request->input('guide_id'), 200);
    }

    public function registerToEvent(Request $request)
    {
        $event = Event::find($request->event_id);
        $state = $event->eventToTourists()->attach($request->tourist_id);

        $registered_events = Tourist::find($request->tourist_id)->touristToEvents;
        return response()->json($registered_events, 200);
    }

    public function registeredEvents(Request $request) 
    {
        $tourist_id = $request->input('tourist_id');
        $tourist = Tourist::find($tourist_id);
        $registeredEvents = $tourist->touristToEvents;
        return response()->json($registeredEvents, 200);
        
    }
}

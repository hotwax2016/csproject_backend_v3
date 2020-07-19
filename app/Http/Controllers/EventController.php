<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Event;
use App\Tourist;
use App\Post;
use App\User;

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


        $guide_id = User::find($request->input('user_id'))->userToGuide->id;
        $post = $event->post()->create(['guide_id' => $guide_id]);

        return response()->json($request->input('guide_id'), 200);
    }

    public function registerToEvent(Request $request)
    {
        $tourist_id = User::find($request->input('user_id'))->userToTourist->id;
        $event = Event::find($request->input('event_id'));

        $state = $event->eventToTourists()->attach($tourist_id);

        $registered_events = Tourist::find($tourist_id)->touristToEvents()->get();
        return response()->json($registered_events, 200);
        /* return response()->json($state, 200); */
    }

    public function registeredEvents(Request $request) 
    {
        $tourist_id = $request->input('tourist_id');
        $tourist = Tourist::find($tourist_id);
        $registeredEvents = $tourist->touristToEvents;

        return response()->json($registeredEvents, 200);
    }
}

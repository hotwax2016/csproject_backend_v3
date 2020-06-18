<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Post;

class EventController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $event = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'participants' => ['required'],
            /* 'locations' => ['required'],
            'activities' => ['required'], */
            'start' => ['required'],
            'end' => ['required'],
        ]);
        
        /* $event = Event::create($event);
        $event->post()->create([
            'state' => true
        ]); */
        
        

        return response()->json($event, 200);
    }
}

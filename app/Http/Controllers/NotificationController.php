<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\NewAppointment;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $notifications = $user->notifications()->latest()->get();

        return response()->json($notifications, 200);
    }

    public function readnotification(Request $request) 
    {
        $notification = NewAppointment::find($request->input(notification_id));
        $notification->markAsRead();
        
        $user = User::find($request->input('user_id'));
        $notifications = $user->notifications()->latest()->get();

        return response()->json($notifications, 200);
    }
}

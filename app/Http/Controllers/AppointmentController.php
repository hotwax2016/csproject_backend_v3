<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewAppointment;
use App\Notifications\AppointmentAccepted;
use App\Notifications\AppointmentDeclined;
use App\Tourist;
use App\Appointment;
use App\User;
use App\Guide;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all()->load('locations.locationToActivity');
        return response()->json($appointments, 200);
    }

    public function getAppointmentsById(Request $request)
    {
        if ($request->has('filter')) {
            $appointment_state = $request->input('filter');
            $guide = User::find($request->input('user_id'))->userToGuide;
            $appointments = $guide->appointments()
                                ->with('locations', 'tourist.touristToUser')
                                ->where('conform', $appointment_state)
                                ->get();
        } else {
            $appointment_state = '';
            $guide = User::find($request->input('user_id'))->userToGuide;
            $appointments = $guide->appointments()
                                ->with('locations', 'tourist.touristToUser')
                                ->get();
        }
        return response()->json($appointments, 200);
    }

    public function store(Request $request)
    {
        $tourist_id = $request->input('inviter.user_id');
        $guide_id = json_encode($request->input('guide.id'));

        if ($request->has('name')) {
            $name = $request->input('name');
        }
        if ($request->has('description')) {
            $description = $request->input('description');
        }
        if ($request->has('notes')) {
            $notes = $request->input('notes');
        }
        if ($request->has('inviter.participants.adults')) {
            $adult_count = $request->input('inviter.participants.adults');
        }
        if ($request->has('start')) {
            $start = $request->input('start');
        }
        if ($request->has('end')) {
            $end = $request->input('end');
        }

        if ($request->has('inviter.participants.children')) {
            $children_count = $request->input('inviter.participants.children');
        }

        if ($request->has('inviter.interests')) {
            $interests = json_encode($request->input('inviter.interests'));
        }

        if ($request->has('inviter.locations')) {
            $locationsId = $request->input('inviter.locations');
        }

        $tourist = Tourist::find($tourist_id);
        $appointment = $tourist->appointments()->create([
            'guide_id' => $guide_id,
            'adults' => $adult_count,
            'children' => $children_count,
            'interests' => $interests,
            'name' => $name,
            'description' => $description,
            'notes' => $notes,
            'start' => $start,
            'end' => $end,
        ]);

        $appointment->locations()->attach($locationsId);

        // notify users by notifications
        $user = User::find(Guide::find($guide_id)->guideToUser->id);
        Notification::send($user, new NewAppointment($appointment));

        return response()->json($appointment, 200);
    }

    public function update(Request $request) 
    {
        $appointment = Appointment::find($request->input('appointment_id'));

        $guide_id = $appointment->guide_id;

        $appointment->update([
            'conform' => $request->input('conform'),
        ]);
        
        $tourist = Tourist::find($appointment->tourist_id);
        $user = User::find($tourist->touristToUser->id);
        
        if ($request->input('conform') == 1) {
            Notification::send($user, new AppointmentAccepted($appointment));
        } else if ($request->input('conform') == 0) {
            Notification::send($user, new AppointmentDeclined($appointment));
        }

        $appointments = Appointment::where('guide_id', $guide_id)
                            ->with('locations', 'tourist.touristToUser')
                            ->get();
        return response()->json($appointments, 200);
    }
}

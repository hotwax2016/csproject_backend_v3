<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function follows(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $follower = $user->follows()->attach($request->input('following_user_id'));

        $follower = $user->follows()
                        ->where('following_user_id', $request->input('following_user_id'))
                        ->get();
        return response()->json($follower, 200);
    }

    public function followsbyid(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $followers = $user->follows()->latest()->get();
        return response()->json($followers, 200);
    }
}

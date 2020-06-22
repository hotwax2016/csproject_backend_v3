<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // request validation
        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'max:32', 'confirmed'],
            'role' => ['required'],
        ]);

        // user registration
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role == 'tourist') {
            $user->userToTourist()->create([
                'active' => true,
            ]);
        } else if ($request->role == 'guide') {
            $user->userToGuide()->create([
                'active' => true,
            ]);
        }

        return response()->json(200);
    }
}

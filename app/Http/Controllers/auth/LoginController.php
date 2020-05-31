<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:6', 'max:32'],
        ]);

        if(Auth::attempt($request->only('email', 'password'))) {
            /* $role = Auth::user()->role;
            if ($role == 'tourist') {
                $user = Auth::user()->load('profile.profileToTourist');
            } else if ($role == 'guide') {
                $user = Auth::user()->load('profile.profileToGuide');
            } */
            $user = Auth::user();
            return response()->json($user, 200);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect'],
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// sanctum route guard
Route::middleware('auth:sanctum')->get('/msg', function (Request $request) {
    return response()->json([
        'msg' => 'success',
    ], 200);
});

//auth routes
Route::post('/register', 'auth\RegistrationController@register');
Route::post('/login', 'auth\LoginController@login');
Route::post('/logout', 'auth\LoginController@logout');

/* Route::get('/msg', function (Request $request) {
    return response()->json([
        'msg' => 'success',
    ], 200);
}); */
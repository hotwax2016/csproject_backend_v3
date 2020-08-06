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

Route::middleware('auth:sanctum')->post('/events', 'EventController@store');
Route::middleware('auth:sanctum')->post('/registertoevent', 'EventController@registerToEvent');
Route::middleware('auth:sanctum')->post('/getregisteredevents', 'EventController@registeredEvents');
Route::middleware('auth:sanctum')->post('/articles', 'ArticleController@store');

Route::middleware('auth:sanctum')->get('/posts', 'PostController@index');
Route::middleware('auth:sanctum')->post('/postsbyid', 'PostController@postsbyid');

Route::middleware('auth:sanctum')->get('/guides', 'GuideController@index');

Route::middleware('auth:sanctum')->post('appointments', 'AppointmentController@store');
Route::middleware('auth:sanctum')->get('appointments', 'AppointmentController@index');
Route::middleware('auth:sanctum')->post('getappointmentsbyid', 'AppointmentController@getAppointmentsById');
Route::middleware('auth:sanctum')->post('updateappointment', 'AppointmentController@update');

Route::middleware('auth:sanctum')->post('/reviews', 'ReviewController@index');
Route::middleware('auth:sanctum')->post('/storereview', 'ReviewController@store');

Route::middleware('auth:sanctum')->get('/categories', 'CategoryController@index');
Route::middleware('auth:sanctum')->post('/filterdestinationsbypreferance', 'FilterController@filterByPreferance');
Route::middleware('auth:sanctum')->get('/destinations', 'DestinationController@index');
Route::middleware('auth:sanctum')->post('/guidesbydestination', 'GuideController@guidesbydestination');

Route::middleware('auth:sanctum')->post('follows', 'UserController@follows');
Route::middleware('auth:sanctum')->post('followsbyid', 'UserController@followsbyid');

Route::middleware('auth:sanctum')->post('notifications', 'NotificationController@index');
Route::middleware('auth:sanctum')->post('readnotification', 'NotificationController@readnotification');

Route::get('/guideswelcomepage', 'GuideController@index');

//auth routes
Route::post('/register', 'auth\RegistrationController@register');
Route::post('/login', 'auth\LoginController@login');
Route::post('/logout', 'auth\LoginController@logout');

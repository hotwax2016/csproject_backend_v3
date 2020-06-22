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

//auth routes
Route::post('/register', 'auth\RegistrationController@register');
Route::post('/login', 'auth\LoginController@login');
Route::post('/logout', 'auth\LoginController@logout');

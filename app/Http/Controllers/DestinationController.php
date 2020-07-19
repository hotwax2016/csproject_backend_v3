<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;

class DestinationController extends Controller
{
    public function index()
    {
        $des = Destination::all()->load('destinationToLocations.locationToActivity.activityToCategories');
        return response()->json($des, 200);
    }
}

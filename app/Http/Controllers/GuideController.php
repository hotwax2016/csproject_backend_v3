<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all()->load('guideToUser', 'guideToDestination')->take(7);
        return response()->json($guides, 200);
    }

    public function guideswelcomepage()
    {
        $guides = Guide::all()->load('guideToUser', 'reviews');
        return response()->json($guides, 200);
    }

    public function guidesbydestination(Request $request)
    {
        $destinations_id = $request->input('data');
        $data = Guide::whereIn('destination_id', $destinations_id)
                    ->with('guideToUser', 'guideToDestination')
                    ->get();
        return response()->json($data, 200);
    }
}

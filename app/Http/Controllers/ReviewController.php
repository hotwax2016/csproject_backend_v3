<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Guide;
use App\User;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        /* $guide_id = $request->input('guide');
        $data = Review::where('guide_id', $guide_id)->latest()->get(); */
        $data = Guide::find($request->input('guide'))->reviews()->latest()->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $guide = Guide::find($request->input('guide_id'));
        $review = $guide->reviews()->create([
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'rating' => $request->input('rating'),
        ]);
        
        $review->guide()->increment('review_count');

        $rating = $request->input('rating');
        if ($rating == 1) {
            $review->guide()->increment('star_1');
        } else if ($rating == 2) {
            $review->guide()->increment('star_2');
        } else if ($rating == 3) {
            $review->guide()->increment('star_3');
        } else if ($rating == 4) {
            $review->guide()->increment('star_4');
        } else if ($rating == 5) {
            $review->guide()->increment('star_5');
        }

        $data = Guide::find($request->input('guide_id'))->load('reviews.user');
        return response()->json($data, 200);
    }
}

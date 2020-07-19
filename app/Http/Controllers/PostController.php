<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Event;
use App\Guide;
use App\User;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all()->load('postable', 'postToGuide.guideToUser');
        return response()->json($posts, 200);
    }

    public function postsbyid(Request $request)
    {
        $guide = User::find($request->input('user_id'))->userToGuide;
        $posts = $guide->guideToPost()->with('postable')->get();
        return response()->json($posts, 200);
    }
    
}

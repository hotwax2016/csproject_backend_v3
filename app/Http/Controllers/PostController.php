<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Event;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all()->load('postable', 'postToGuide');
        return response()->json($posts, 200);
    }
    
}

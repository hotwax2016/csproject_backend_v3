<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all()->load('postable');
        return response()->json($posts, 200);
    }
}

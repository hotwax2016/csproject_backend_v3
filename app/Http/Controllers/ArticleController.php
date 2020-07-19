<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        
        $article = Article::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        $guide = User::find($request->input('user_id'))->userToGuide;
        $post = $article->post()->create(['guide_id' => $guide->id]);
        /* return response()->json($article, 200); */
        return response()->json($post, 200);
    }
}

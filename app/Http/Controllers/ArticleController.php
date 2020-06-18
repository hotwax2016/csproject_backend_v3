<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $article = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);
        
        $article = Article::create($article);
        $article->post()->create([
            'state' => true
        ]);
        return response()->json($article, 200);
    }
}

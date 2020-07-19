<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() 
    {
        $data = Category::all();
        return response()->json($data, 200);
    }
}

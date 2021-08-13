<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{
    public function index(Post $post)
    {
        return view('admin.ingredients.index', [
            'ingredients' => $post->ingredients
        ]);
    }
}

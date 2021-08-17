<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('categories.index', [
            'posts' => $category->posts()->active()->with('category')->paginate(9),
            'categoryName' => $category->name
        ]);
    }
}

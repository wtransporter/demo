<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        cache()->forget('categories');

        return redirect()->route('categories.index')->with('message', 'Category deleted');
    }
}

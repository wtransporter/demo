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

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'slug' => ['required']
        ]);

        $category->update($attributes);

        cache()->forget('categories');

        return redirect()->route('categories.edit', $category)->with('message', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        cache()->forget('categories');

        return redirect()->route('categories.index')->with('message', 'Category deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryFormRequest;

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

    public function update(UpdateCategoryFormRequest $request, Category $category)
    {
        $attributes = $request->validated();

        $category->update($attributes);

        cache()->forget('categories');

        return redirect()->route('categories.edit', $category)->with('message', 'Category updated successfully.');
    }

    /**
     * Delete given resource
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        cache()->forget('categories');

        return redirect()->route('categories.index')->with('message', 'Category deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Icon;
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
        return view('admin.categories.edit', [
            'category' => $category->load('icon')
        ]);
    }

    /**
     * Update given category
     *
     * @param UpdateCategoryFormRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryFormRequest $request, Category $category)
    {
        $attributes = $request->validated();

        $category->update($attributes);

        cache()->forget('categories');

        return redirect()->route('categories.edit', $category)->with('message', 'Category updated successfully.');
    }

    public function create()
    {
        return view('admin.categories.create', [
            'icons' => Icon::all()
        ]);
    }

    /**
     * Store given category
     *
     * @param UpdateCategoryFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UpdateCategoryFormRequest $request)
    {
        $attributes = $request->validated();

        Category::create($attributes);

        cache()->forget('categories');

        return redirect()->route('categories.create')->with('message', 'Category added.');
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

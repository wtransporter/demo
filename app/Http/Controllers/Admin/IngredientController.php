<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index(Post $post)
    {
        return view('admin.ingredients.index', [
            'ingredients' => $post->ingredients->load('post')
        ]);
    }

    /**
     * Update given ingredient
     *
     * @param Request $request
     * @param Post $post
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post, Ingredient $ingredient)
    {
        $attributes = $request->validate([
            'description' => ['required']
        ]);

        $post->ingredients()->find(['id', $ingredient->id])->first()->update($attributes);

        return redirect()->route('posts.ingredients.index', $post)->with('message', 'Ingredient updated.');
    }

    /**
    * Delete the given ingredient.
    *
    * @param Post $post
    * @param Ingredient $ingredient
    * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy(Post $post,Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('posts.ingredients.index', $post)->with('message', 'Ingredient successfully deleted.');
    }

}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IconController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IngredientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [UserController::class, 'index'])->name('dashboard');

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::resource('posts', PostController::class)->only(['create', 'show', 'edit', 'update']);
Route::get('categories/{category:slug}/posts', [CategoryPostController::class, 'index'])->name('category.post.index');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts.ingredients', IngredientController::class)->only(['index', 'update', 'destroy', 'store']);
    Route::resource('icons', IconController::class)->only(['index', 'update', 'store', 'destroy']);
});

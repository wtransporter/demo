<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryPostController;

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

Route::group(['middleware' => 'auth'], function() {
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category:slug}/posts', [CategoryPostController::class, 'index'])->name('category.post.index');

    Route::post('/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

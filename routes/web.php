<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
// Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
// Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::resource('posts', PostController::class)->only(['create', 'show']);

Route::post('/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');

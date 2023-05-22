<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');


Route::get('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profiles.show');
Route::get('/profiles/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit');
Route::patch('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');

Route::get('/post/{post}/delete', [App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');

Route::get('/profiles', [App\Http\Controllers\ProfileController::class, 'index'])->name('profiles.index');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/buy/{id}', [App\Http\Controllers\PostController::class, 'buy'])->name('posts.buy');
Route::post('/buy', [App\Http\Controllers\PostController::class, 'buy_eff'])->name('buy.eff');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::post('/follows/{profile}', [App\Http\Controllers\FollowController::class, 'store'])->name('follows.show');

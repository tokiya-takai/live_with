<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/posts/show',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
Route::get('/posts/new', [App\Http\Controllers\PostsController::class, 'new'])->name('posts.new');


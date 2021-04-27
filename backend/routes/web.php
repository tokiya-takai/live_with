<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index']);

Route::get('/posts/show/{id}',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show')->middleware('auth');

Route::get('/posts/new', [App\Http\Controllers\PostsController::class, 'new'])->name('posts.new')->middleware('auth');
Route::post('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->middleware('auth');

Route::get('/posts/edit/{id}', [App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::post('/posts/update/{id}', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update')->middleware('auth');


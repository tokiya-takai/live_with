<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// PostsController
Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index']);

Route::middleware('auth')->group(function() {
  Route::get('/posts/show/{id}',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
  
  Route::get('/posts/new', [App\Http\Controllers\PostsController::class, 'new'])->name('posts.new');
  Route::post('/posts/create', [App\Http\Controllers\PostsController::class, 'create']);
  
  Route::get('/posts/edit/{id}', [App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit');
  Route::post('/posts/update/{id}', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');
  
  Route::post('/posts/delete/{id}',[App\Http\Controllers\PostsController::class, 'delete'])->name('posts.delete');
  
  // UsersController
  Route::get('/users/{id}',[App\Http\Controllers\UsersController::class, 'index'])->name('user.index');
  Route::post('/users/update/{id}',[App\Http\Controllers\UsersController::class, 'update']);
});



<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});

//Route::view('/dashboard','dashboard' ) ;

Route::get('/posts',[PostController::class ,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class ,'create'])-> name('posts.create');
Route::get('/posts/{id}',[PostController::class ,'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+')->name('posts.destroy');

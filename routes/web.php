<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/blog/post/{id}', [PostController::class, 'read'])->name('post');
Route::get('/blog/user/{id}', [UserController::class, 'read'])->name('user');
Route::get('/blog/user/{idUser}/albums', [AlbumController::class, 'readAll'])->name('albums');
Route::get('/blog/user/{idUser}/album/{idAlbum}', [AlbumController::class, 'readOne'])->name('album');
Route::post('/addComment', [CommentController::class, 'addComment'])->name('addComment');
Route::delete('/comment/{id}', [CommentController::class, 'supComment'])->name('supComment');
Route::get('/comment/{id}/edit', [CommentController::class, 'ediComment'])->name('ediComment');
Route::get('/comment/{id}', [CommentController::class, 'update'])->name('updateComment');



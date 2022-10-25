<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/single-post/{post:slug}', [PostController::class, 'getSinglePost'])->name('single.post');

Route::post('/single-post/{post:slug}', [CommentController::class, 'setComment'])->name('comment.store');

Route::get('/register', [AuthController::class, 'getRegister'])->name('register');

Route::post('/register', [AuthController::class, 'setRegister'])->name('user.store');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');

Route::post('/login', [AuthController::class, 'setLogin'])->name('user.auth');;

Route::post('/logout', [AuthController::class, 'setLogout'])->name('logout');

Route::get('/user/dashboard', [UserController::class, 'getDashboard'])->name('dashboard');

Route::get('/post/create', [PostController::class, 'getAddPost'])->name('post.create');

Route::post('/post/create', [PostController::class, 'setAddPost'])->name('post.store');

Route::get('/user/posts', [PostController::class, 'getPosts'])->name('posts.show');

Route::get('/post/delete/{post:slug}', [PostController::class, 'deletePost'])->name('post.delete');

Route::get('post/edit/{post:slug}',[PostController::class, 'getEditPost'])->name('post.edit');

Route::post('post/edit/{post:slug}', [PostController::class, 'setEditPost'])->name('post.update');

Route::get('category/{category:name}', [PostController::class, 'getByCategory'])->name('category.posts');

Route::get('author/{author:username}', [PostController::class, 'getByAuthor'])->name('author.posts');


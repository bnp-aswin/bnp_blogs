<?php

use App\Http\Controllers\AdminController;
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

Route::get('/register', [AuthController::class, 'getRegister'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'setRegister'])->name('user.store')->middleware('guest');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'setLogin'])->name('user.auth')->middleware('guest');;

Route::post('/logout', [AuthController::class, 'setLogout'])->name('logout')->middleware('auth');

Route::get('/user/dashboard', [UserController::class, 'getDashboard'])->name('dashboard')->middleware('auth');

Route::get('/post/create', [PostController::class, 'getAddPost'])->name('post.create')->middleware('auth');

Route::post('/post/create', [PostController::class, 'setAddPost'])->name('post.store')->middleware('auth');

Route::get('/user/posts', [PostController::class, 'getPosts'])->name('posts.show')->middleware('auth');

Route::get('/post/delete/{post:slug}', [PostController::class, 'deletePost'])->name('post.delete')->middleware('auth');

Route::get('post/edit/{post:slug}',[PostController::class, 'getEditPost'])->name('post.edit')->middleware('auth');

Route::post('post/edit/{post:slug}', [PostController::class, 'setEditPost'])->name('post.update')->middleware('auth');

Route::get('category/{category:name}', [PostController::class, 'getByCategory'])->name('category.posts');

Route::get('author/{author:username}', [PostController::class, 'getByAuthor'])->name('author.posts');

Route::post('search', [PostController::class, 'getSearch'])->name('search');

Route::get('/admin/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard');

Route::get('/admin/add/category', [AdminController::class, 'getAddCategory'])->name('category.create');

Route::post('/admin/add/category', [AdminController::class, 'setAddCategory'])->name('post.category');
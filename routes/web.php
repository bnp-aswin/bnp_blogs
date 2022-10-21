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

Route::post('/single-post/{post:slug}', [CommentController::class, 'store'])->name('post.comment');

Route::get('/register', [AuthController::class, 'getRegister'])->name('register');

Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');

Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');;

Route::post('/logout', [AuthController::class, 'postLogout'])->name('logout');

Route::get('/user/dashboard', [UserController::class, 'getDashboard'])->name('dashboard');

Route::get('/post/create', [PostController::class, 'getAddNewPost'])->name('create.post');

Route::post('/post/create', [PostController::class, 'postAddNewPost'])->name('store.post');

Route::get('/user/posts', [PostController::class, 'getAllPosts'])->name('user.posts');

Route::get('post/edit/{post:slug}',[PostController::class, 'getEditPost'])->name('edit.post');

Route::post('post/edit/{post:slug}', [PostController::class, 'setEditPost'])->name('update.post');



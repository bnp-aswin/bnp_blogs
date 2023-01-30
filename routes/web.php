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

Route::controller(PostController::class)->group(function(){

    Route::middleware('isAuthUser:2')->group(function(){

        Route::get('/post/create', 'getAddPost')->name('post.create');
        Route::post('/post/create', 'setAddPost');
        Route::get('/user/posts', 'getPosts')->name('posts.show');
        Route::get('/post/delete/{post:slug}', 'deletePost')->name('post.delete');
        Route::get('post/edit/{post:slug}', 'getEditPost')->name('post.edit');
        Route::post('post/edit/{post:slug}', 'setEditPost');
    });

    Route::get('/single-post/{post:slug}', 'getSinglePost')->name('single.post');
    Route::get('category/{category:name}', 'getByCategory')->name('category.posts');
    Route::get('author/{author:username}', 'getByAuthor')->name('author.posts');
    Route::post('search', 'getSearch')->name('search');

});

Route::controller(AuthController::class)->group(function(){

    Route::middleware(['guest'])->group(function(){

        Route::get('/register', 'getRegister')->name('register');
        Route::post('/register', 'setRegister');
        Route::get('/login', 'getLogin')->name('login');
        Route::post('/login', 'setLogin');
        Route::view('/forget-password', 'auth.forget-password')->name('forgetPassword');

    });
        Route::middleware(['isAdmin:2'])->group(function(){
            Route::view('/user/edit-profile', 'user.edit-profile');
        });
    Route::view('/user/profile', 'user.profile')->name('profile');
    
    Route::post('/logout', 'setLogout')->name('logout')->middleware('auth');

});

Route::post('/single-post/{post:slug}', [CommentController::class, 'setComment']);

Route::get('/user/dashboard', [UserController::class, 'getDashboard'])->name('dashboard')->middleware('isAuthUser:2');

Route::controller(AdminController::class)->group(function(){

    Route::middleware(['isAdmin:1'])->group(function(){

        Route::get('/admin/dashboard', 'getDashboard')->name('admin.dashboard');
        Route::get('/admin/add/category', 'getAddCategory')->name('category.create');
        Route::post('/admin/add/category', 'setAddCategory');
        Route::get('/admin/all-posts', 'getPosts')->name('all-posts');
        Route::post('/admin/all-posts', 'updatePostStatus');

    });
});





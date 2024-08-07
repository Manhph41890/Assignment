<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use Illuminate\Support\Facades\Route;


Route::get('/', [NewsController::class, 'index'])->name('index');

Route::get('/category_blog/{id}', [NewsController::class, 'showByCategory'])->name('category_blog');

Route::get('/news/{id}', [NewsController::class, 'detail'])->name('news_detail');

Route::get('/search', [NewsController::class, 'search'])->name('search');

Route::get('/category/list', [AdminCategoryController::class, 'index'])->name('category.list')->middleware(['auth', IsAdmin::class]);
Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('category.create')->middleware(['auth', IsAdmin::class]);
Route::post('/category/create', [AdminCategoryController::class, 'store'])->name('category.store')->middleware(['auth', IsAdmin::class]);
Route::get('/category/{category}', [AdminCategoryController::class, 'show'])->name('category.show')->middleware(['auth', IsAdmin::class]);
Route::get('/category/edit/{category}', [AdminCategoryController::class, 'edit'])->name('category.edit')->middleware(['auth', IsAdmin::class]);
Route::put('/category/update/{category}', [AdminCategoryController::class, 'update'])->name('category.update')->middleware(['auth', IsAdmin::class]);
Route::delete('/category/delete/{category}', [AdminCategoryController::class, 'destroy'])->name('category.delete')->middleware(['auth', IsAdmin::class]);

Route::get('/post/list', [PostsController::class, 'index'])->name('news.list');
Route::get('/post/create', [PostsController::class, 'create'])->name('news.create');
Route::post('/post/create', [PostsController::class, 'store'])->name('news.store');
Route::get('/post/{id}', [PostsController::class, 'show'])->name('news.show');
Route::get('/post/edit/{id}', [PostsController::class, 'edit'])->name('news.edit');
Route::put('/post/update/{id}', [PostsController::class, 'update'])->name('news.update');
Route::delete('/post/delete/{id}', [PostsController::class, 'destroy'])->name('news.delete');

Route::get('login', [AuthenController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthenController::class, 'handleLogin'])->name('login.handle');

Route::get('register', [AuthenController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthenController::class, 'handleRegister'])->name('register.handle');

Route::post('logout', [AuthenController::class, 'handleLogout'])->name('logout');

Route::get('/index', function () {
    return view('admin.index');
})->name('admin.index')->middleware(['auth', IsAdmin::class]);

Route::get('/about', function () {
    return view('client.about');
})->name('about');
Route::get('/contact', function () {
    return view('client.contact');
})->name('contact');
// Route::get('/login', function () {
//     return view('client.login');
// })->name('login');
// Route::get('/register', function () {
//     return view('client.register');
// })->name('register');














// <li><a href="{{ route('about') }}">Giới thiệu</a></li>
// <li><a href="{{ url('/about') }}">Giới thiệu</a></li>

//Route::get('/about', function () {
//     return view('client.about');
// })->name('about');
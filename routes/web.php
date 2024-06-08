<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;





Route::get('/dashboard', [CommonController::class, 'index'])->middleware('auth', 'verified')->name('dashboard');

//info update
Route::get('/info_edit', [MainController::class, 'info_edit'])->middleware('auth', 'verified')->name('info.edit');
Route::post('/info_update', [MainController::class, 'info_update'])->name('info.update');

//category 
Route::get('/category', [CategoryController::class, 'category'])->middleware('auth', 'verified')->name('category');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::post('/category/update/{id}', [CategoryController::class, 'category_update'])->name('category.update');
Route::get('/category_delete/{id}', [CategoryController::class, 'category_delete'])->middleware('auth', 'verified')->name('category.delete');
Route::get('/category_trash', [CategoryController::class, 'category_trash'])->middleware('auth', 'verified')->name('category.trash');
Route::get('/category_restore/{id}', [CategoryController::class, 'category_restore'])->name('category.restore');
Route::get('/category_permanent_delete/{id}', [CategoryController::class, 'category_per_del'])->name('category.per.del');


//Blog 
Route::get('/blog_list', [BlogController::class, 'blog_list'])->middleware('auth', 'verified')->name('blog.list');
Route::get('/add_blog', [BlogController::class, 'add_blog'])->middleware('auth', 'verified')->name('add.blog');
Route::post('/blog/store', [BlogController::class, 'blog_store'])->middleware('auth', 'verified')->name('blog.store');
Route::get('/blog_edit/{id}', [BlogController::class, 'blog_edit'])->middleware('auth', 'verified')->name('blog.edit');
Route::post('/blog/update/{id}', [BlogController::class, 'blog_update'])->name('blog.update');
Route::get('/blog/delete/{id}', [BlogController::class, 'blog_delete'])->name('blog.delete');
Route::get('/blog_trash', [BlogController::class, 'blog_trash'])->name('blog.trash');
Route::get('/blog/restore/{id}', [BlogController::class, 'blog_restore'])->name('blog.restore');
Route::get('/blog/per/del/{id}', [BlogController::class, 'blog_per_del'])->name('blog.per.del');
Route::get('/blog/status/{id}', [BlogController::class, 'blog_status'])->name('blog.status');


//Profile
Route::get('/profile',[ProfileController::class, 'profile'])->middleware('auth', 'verified')->name('profile');
Route::get('/profile/setting',[ProfileController::class, 'profile_setting'])->middleware('auth', 'verified')->name('profile.setting');
Route::post('/profile/settings/update',[ProfileController::class, 'profile_settings_update'])->name('profile.settings.update');
Route::get('/profile/security',[ProfileController::class, 'profile_security'])->middleware('auth', 'verified')->name('profile.security');
Route::post('/profile/security/update',[ProfileController::class, 'profile_security_update'])->name('profile.security.update');

//users
Route::get('/users', [UsersController::class, 'users'])->middleware('auth', 'verified')->name('users');
Route::post('/users/store', [UsersController::class, 'users_store'])->name('users.store');
Route::get('/user/edit/{id}', [UsersController::class, 'user_edit'])->name('user.edit');
Route::post('/user/update/{id}', [UsersController::class, 'user_update'])->name('user.update');
Route::get('/user/delete/{id}', [UsersController::class, 'user_delete'])->name('user.delete');
Route::get('/roll', [UsersController::class, 'roll'])->name('roll');

Route::get('/subscribers', [SubscribersController::class, 'subscribers'])->middleware('auth', 'verified')->name('subscribers');
Route::get('/subscribers/reply/{id}', [SubscribersController::class, 'subscribers_reply'])->name('subscribers.reply');
Route::post('/subscribers/reply/store/{id}', [SubscribersController::class, 'subscribers_reply_store'])->name('subscribers.reply.store');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
require __DIR__.'/frontend.php';

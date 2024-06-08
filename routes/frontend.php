<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/singleBlog/{slug}', [FrontendController::class, 'single_blog'])->name('single.blog');
Route::get('/allBlog', [FrontendController::class, 'all_blog'])->name('all.blog');
Route::get('/allBlog', [FrontendController::class, 'all_blog'])->name('all.blog');
Route::get('/search', [FrontendController::class, 'search'])->name('search');

Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');
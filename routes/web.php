<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\PostOld;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Collections;
use Illuminate\Support\Facades\Route;
use App\Services\MailchimpNewsletter;
use Illuminate\Validation\ValidationException;

Route::post('newsletter', [NewsletterController::class, 'addToList']);

Route::get('/collections', function () {
    return Collections::findName();
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('home', [PostController::class, 'home_redirect']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [LoginController::class, 'loginPage'])->middleware('guest');
Route::post('login', [LoginController::class, 'logUserIn'])->middleware('guest');

Route::post('logout', [LoginController::class, 'logOutUser'])->middleware('auth');

Route::get('/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', [PostController::class, 'category'])->name('category');

Route::get('author/{author:username}', [PostController::class, 'author']);

Route::post('/{post:slug}/comment', [CommentController::class, 'store'])->middleware('auth');

Route::post('admin/posts/store', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::post('admin/{post}/edit', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/{post}/delete', [AdminPostController::class, 'destroy'])->middleware('admin');


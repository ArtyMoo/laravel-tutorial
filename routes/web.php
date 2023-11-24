<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\PostOld;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Collections;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/collections', function () {
    return Collections::findName();
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', [PostController::class, 'category'])->name('category');

Route::get('author/{author:username}', [PostController::class, 'author']);



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\CheckStatus;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'create'])->name('posts_create');
Route::post('/posts/create', [App\Http\Controllers\PostController::class, 'store'])->name('posts_store');
Route::get('/posts/show/{post_id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts_show');
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('comments_store');
Route::get('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::post('/posts/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments_store');


Route::middleware([CheckStatus::class])->group(function(){

    Route::get('home', [HomeController::class,'home']);
});
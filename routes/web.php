<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;


Route::get('/',[PostController::class,'index'])->name('home');
Route::get('posts/{post:slug}',[PostController::class, 'show']);


Route::post('newsletter', NewsletterController::class);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');



Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);



Route::get('admin/posts/create',[PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts',[PostController::class, 'store'])->middleware('admin');


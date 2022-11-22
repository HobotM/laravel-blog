<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;


//Main
Route::get('/',[PostController::class,'index'])->name('home');
Route::get('posts/{post:slug}',[PostController::class, 'show']);



//Newsletter
Route::post('newsletter', NewsletterController::class);

//register
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


//admin section
Route::post('admin/posts',[AdminPostController::class, 'store'])->middleware('can:admin');
Route::get('admin/posts/create',[AdminPostController::class, 'create'])->middleware('can:admin');

Route::get('admin/users',[AdminUserController::class, 'index'])->middleware('can:admin');
Route::delete('admin/users/{user}',[AdminUserController::class, 'destroy'])->middleware('can:admin');

Route::get('admin/posts',[AdminPostController::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit',[AdminPostController::class, 'edit'])->middleware('can:admin');

Route::patch('admin/posts/{post}',[AdminPostController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}',[AdminPostController::class, 'destroy'])->middleware('can:admin');

//login
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//comment
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);






//Forgot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForm'])->name('forget.password.get')->middleware('guest');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForm'])->name('forget.password.post')->middleware('guest');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get')->middleware('guest');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post')->middleware('guest');

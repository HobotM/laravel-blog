<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\Auth\RegisterController;
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


    //login
    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
    Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

    //comment
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


    //email verification
    Route::group(['middleware' => ['isVerified']], function () {


    });
    //user actions
    Route::get('user/posts/create',[UserPostController::class, 'create'])->middleware('can:user');
    Route::post('user/posts',[AdminPostController::class, 'store'])->middleware('can:user');


     //admin section
    Route::post('admin/posts',[AdminPostController::class, 'store'])->middleware('can:admin');
    Route::get('admin/posts/create',[AdminPostController::class, 'create'])->middleware('can:admin');

    Route::get('admin/users',[AdminUserController::class, 'index'])->middleware('can:admin');
    Route::get('admin/admins',[AdminUserController::class, 'admins'])->middleware('can:admin');


    Route::get('admin/superAdmins',[AdminUserController::class, 'superAdmins'])->middleware('can:admin');
    Route::delete('admin/users/{user}',[AdminUserController::class, 'destroy'])->middleware('can:superAdmin');

    Route::delete('admin/admins/{user}',[AdminUserController::class, 'destroy'])->middleware('can:superAdmin');
    Route::get('admin/admins/{user}/edit',[AdminUserController::class, 'edit'])->middleware('can:superAdmin');

    Route::get('admin/posts',[AdminPostController::class, 'index'])->middleware('can:admin');
    Route::get('admin/posts/{post}/edit',[AdminPostController::class, 'edit'])->middleware('can:admin');


    Route::patch('admin/posts/{post}',[AdminPostController::class, 'update'])->middleware('can:admin');
    Route::delete('admin/posts/{post}',[AdminPostController::class, 'destroy'])->middleware('can:admin');



    Route::get('admin/users/{user}/edit',[AdminUserController::class, 'edit'])->middleware('can:admin');
    Route::patch('admin/users/{user}',[AdminUserController::class, 'update'])->middleware('can:admin');


    Route::get('email-verification',[RegisterController::class, 'VerificationAwait'])->name('email-verification');
    Route::get('email-verification/error', [RegisterController::class, 'getVerificationError'])->name('email-verification.error');
    Route::get('email-verification/check/{token}', [RegisterController::class, 'getVerification'])->name('email-verification.check');

    //register
    Route::get('register', [RegisterController::class, 'RegistrationForm'])->middleware('guest');
    Route::post('register', [RegisterController::class, 'register'])->middleware('guest');



    //Forgot password
    Route::get('forget-password', [ForgotPasswordController::class, 'showForm'])->name('forget.password.get')->middleware('guest');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForm'])->name('forget.password.post')->middleware('guest');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get')->middleware('guest');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post')->middleware('guest');

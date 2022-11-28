<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Notifications\WelcomeEmail;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register.create');
    }


    public function store(Request $request)
    {


        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed'

        ]);

       $user = User::create($attributes);
       $user->notify(new WelcomeEmail($user));

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created, check your email!');;
    }
}

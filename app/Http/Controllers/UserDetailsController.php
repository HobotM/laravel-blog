<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminPostController;



class UserDetailsController extends Controller
{
    public function index(User $user)
    {
        return view('user.details.index',  ['user' => $user])->with('user_id', auth()->id());
    }
    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|string',
        ]);
        
        $user->update($attributes);
        $user->save();

        return back()->with('success', 'Your details are updated successfully!');
    }

}

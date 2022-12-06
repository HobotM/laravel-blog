<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function create()
    {
        return view('user.create');
    }



    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('/images/thumbnails')
        ]));

        return redirect('/');
    }
}

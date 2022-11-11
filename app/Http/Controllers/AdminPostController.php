<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [

            'posts' => Post::paginate(50)

        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title' =>'required',
            'thumbnail' => 'required|image',
            'slug' => ['required',Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' =>'required',
            'category_id' =>['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);


    }


}
